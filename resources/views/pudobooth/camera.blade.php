<x-layout title="OSIS MPK MHT">
  <x-slot:metadesc>
    <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">
    <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">
    <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">
    <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">
  </x-slot:metadesc>

  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">PudoBooth Camera (GPU Filters)</h1>

    <div id="camera-container" class="relative w-[800px] h-[600px] border-4 border-gray-800 bg-black rounded-lg overflow-hidden shadow-lg">
      <!-- Video element is positioned off-screen instead of hidden -->
      <video id="camera-feed" autoplay playsinline style="position: absolute; top: -9999px; left: -9999px;"></video>
      <canvas id="camera-canvas" class="w-full h-full"></canvas>
      <div id="layout-overlay" class="absolute top-0 left-0 w-full h-full bg-cover pointer-events-none"></div>
    </div>

    <!-- Controls -->
    <div id="controls" class="mt-6 bg-white rounded-xl shadow-md p-6 flex flex-col gap-4 w-full max-w-4xl">
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        <div><label class="block text-sm">Vibrance</label><input id="vibrance" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Highlights</label><input id="highlights" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Shadows</label><input id="shadows" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">White Point</label><input id="whitepoint" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Black Point</label><input id="blackpoint" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Sharpness</label><input id="sharpness" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Exposure</label><input id="exposure" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">Blur</label><input id="blur" type="range" min="0" max="20" value="0" class="w-40"></div>
        <div><label class="block text-sm">Glow</label><input id="glow" type="range" min="0" max="20" value="0" class="w-40"></div>
        <div><label class="block text-sm">Vignette</label><input id="vignette" type="range" min="0" max="200" value="100" class="w-40"></div>
        <div><label class="block text-sm">RGB Split</label><input id="rgbsplit" type="range" min="0" max="40" value="0" class="w-40"></div>
      </div>

      <div class="flex gap-3 justify-center mt-4">
        <button id="shoot-button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Shoot</button>
        <button id="save-button" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md">Save Photo</button>
        <button id="change-layout-button" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-md">Change Layout</button>
        <button id="reset-button" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-md">Reset</button>
      </div>
    </div>
    
    <!-- Preview modal for shoot button -->
    <div id="preview-modal" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50">
      <div class="relative max-w-4xl max-h-screen p-4">
        <button id="close-preview" class="absolute top-2 right-2 text-white text-2xl font-bold bg-black bg-opacity-50 rounded-full w-8 h-8 flex items-center justify-center">&times;</button>
        <img id="preview-image" class="max-w-full max-h-full" alt="Photo preview">
      </div>
    </div>
  </div>

  <!-- GPU.js library for GPU-accelerated processing -->
  <script src="https://cdn.jsdelivr.net/npm/gpu.js@latest/dist/gpu-browser.min.js"></script>

  <script>
    // elements
    const video = document.getElementById('camera-feed');
    const canvas = document.getElementById('camera-canvas');
    const ctx = canvas.getContext('2d');
    const layoutOverlay = document.getElementById('layout-overlay');
    const shootButton = document.getElementById('shoot-button');
    const saveButton = document.getElementById('save-button');
    const changeLayoutButton = document.getElementById('change-layout-button');
    const resetButton = document.getElementById('reset-button');
    const previewModal = document.getElementById('preview-modal');
    const previewImage = document.getElementById('preview-image');
    const closePreview = document.getElementById('close-preview');

    // Set canvas dimensions
    canvas.width = 800;
    canvas.height = 600;

    // placeholders for objects we'll set up after camera starts
    let videoReady = false;
    let stream = null; // Store the stream reference
    let animationFrame = null;
    let gpu = null;
    let filterKernel = null;
    let tempCanvas = null;
    let tempCtx = null;

    // sliders
    const sliders = {};
    ['vibrance','highlights','shadows','whitepoint','blackpoint','sharpness','exposure','blur','glow','vignette','rgbsplit']
      .forEach(id => sliders[id] = document.getElementById(id));

    // layout images
    const layouts = [
      '',
      'https://via.placeholder.com/800x600/0000FF/808080?Text=Layout+1',
      'https://via.placeholder.com/800x600/FF0000/FFFFFF?Text=Layout+2',
      'https://via.placeholder.com/800x600/00FF00/000000?Text=Layout+3'
    ];
    let currentLayout = 0;

    // Initialize GPU.js
    function initGPU() {
      try {
        gpu = new GPU();
        
        // Create a temporary canvas for GPU processing
        tempCanvas = document.createElement('canvas');
        tempCanvas.width = canvas.width;
        tempCanvas.height = canvas.height;
        tempCtx = tempCanvas.getContext('2d');
        
        // Create the filter kernel
        createFilterKernel();
        
        console.log('GPU.js initialized successfully');
        return true;
      } catch (e) {
        console.error('Failed to initialize GPU.js:', e);
        alert('Your browser doesn\'t support WebGL, which is required for GPU-accelerated filters. Falling back to CPU processing.');
        return false;
      }
    }

    // Create the GPU filter kernel
    function createFilterKernel() {
      filterKernel = gpu.createKernel(function(image, vibrance, highlights, shadows, whitepoint, blackpoint, exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal) {
        const pixel = image[this.thread.y][this.thread.x];
        
        // Extract RGB values
        let r = pixel[0];
        let g = pixel[1];
        let b = pixel[2];
        
        // Apply exposure
        r = r * (1.0 + exposure);
        g = g * (1.0 + exposure);
        b = b * (1.0 + exposure);
        
        // Apply contrast based on highlights
        const contrastFactor = 1.0 + (highlights * 0.3);
        r = ((r / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;
        g = ((g / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;
        b = ((b / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;
        
        // Apply vibrance (selective saturation)
        const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
        const sat = (vibrance > 0.0) ? 1.0 + vibrance * 0.8 : 1.0 + vibrance * 0.5;
        r = gray + sat * (r - gray);
        g = gray + sat * (g - gray);
        b = gray + sat * (b - gray);
        
        // Apply white point
        if (whitepoint !== 1.0) {
          const wp = 1.0 + (whitepoint - 1.0) * 0.25;
          r = r * wp;
          g = g * wp;
          b = b * wp;
        }
        
        // Apply black point
        if (blackpoint !== 1.0) {
          const bp = 1.0 - (1.0 - blackpoint) * 0.25;
          r = r * bp;
          g = g * bp;
          b = b * bp;
        }
        
        // Apply shadows (darken mid-tones)
        if (shadows < 0.0) {
          const shadowFactor = Math.max(-shadows * 0.2, 0.0);
          const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
          r = r * (1.0 - shadowFactor) + gray * shadowFactor;
          g = g * (1.0 - shadowFactor) + gray * shadowFactor;
          b = b * (1.0 - shadowFactor) + gray * shadowFactor;
        }
        
        // Apply vignette
        if (vignetteVal > 0.0) {
          const x = this.thread.x;
          const y = this.thread.y;
          const centerX = this.constants.width / 2.0;
          const centerY = this.constants.height / 2.0;
          const maxDist = Math.sqrt(centerX * centerX + centerY * centerY);
          const dist = Math.sqrt((x - centerX) * (x - centerX) + (y - centerY) * (y - centerY));
          const vignette = 1.0 - (dist / maxDist) * vignetteVal;
          
          r = r * vignette;
          g = g * vignette;
          b = b * vignette;
        }
        
        // Clamp values
        r = Math.min(255.0, Math.max(0.0, r));
        g = Math.min(255.0, Math.max(0.0, g));
        b = Math.min(255.0, Math.max(0.0, b));
        
        this.color(r, g, b, pixel[3]);
      })
      .setOutput([canvas.width, canvas.height])
      .setGraphical(true)
      .setConstants({ width: canvas.width, height: canvas.height });
    }

    // Apply filters using GPU.js
    function applyGPUFilters() {
      if (!gpu || !filterKernel || !videoReady) return;
      
      // Draw video to temporary canvas
      tempCtx.drawImage(video, 0, 0, tempCanvas.width, tempCanvas.height);
      
      // Get image data from temporary canvas
      const imageData = tempCtx.getImageData(0, 0, tempCanvas.width, tempCanvas.height);
      
      // Convert to format expected by GPU.js
      const pixels = [];
      for (let y = 0; y < tempCanvas.height; y++) {
        const row = [];
        for (let x = 0; x < tempCanvas.width; x++) {
          const idx = (y * tempCanvas.width + x) * 4;
          row.push([
            imageData.data[idx],
            imageData.data[idx + 1],
            imageData.data[idx + 2],
            imageData.data[idx + 3]
          ]);
        }
        pixels.push(row);
      }
      
      // Get slider values
      const vibrance = (Number(sliders.vibrance.value) - 100) / 100;   // -1..+1
      const highlights = (Number(sliders.highlights.value) - 100) / 100;
      const shadows = (Number(sliders.shadows.value) - 100) / 100;
      const whitepoint = Number(sliders.whitepoint.value) / 100; // 0..2
      const blackpoint = Number(sliders.blackpoint.value) / 100; // 0..2
      const exposure = (Number(sliders.exposure.value) - 100) / 100; // -1..+1
      const sharpness = (Number(sliders.sharpness.value) - 100) / 100; // -1..+1
      const blurVal = Number(sliders.blur.value);
      const glowVal = Number(sliders.glow.value);
      const vignetteVal = Number(sliders.vignette.value) / 200;
      const rgbSplitVal = Number(sliders.rgbsplit.value);
      
      // Apply filters on GPU
      const filteredCanvas = filterKernel(pixels, vibrance, highlights, shadows, whitepoint, blackpoint, exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal);
      
      // Draw the result to our main canvas
      ctx.drawImage(filteredCanvas, 0, 0);
      
      // Apply post-processing effects that can't be done in the kernel
      if (blurVal > 0) {
        ctx.filter = `blur(${blurVal}px)`;
        ctx.drawImage(canvas, 0, 0);
        ctx.filter = 'none';
      }
      
      if (rgbSplitVal > 0) {
        ctx.globalCompositeOperation = 'screen';
        ctx.globalAlpha = 0.5;
        
        // Red channel - shift right
        ctx.drawImage(canvas, rgbSplitVal/2, 0, canvas.width, canvas.height);
        
        // Blue channel - shift left
        ctx.globalCompositeOperation = 'multiply';
        ctx.drawImage(canvas, -rgbSplitVal/2, 0, canvas.width, canvas.height);
        
        ctx.globalCompositeOperation = 'source-over';
        ctx.globalAlpha = 1.0;
      }
      
      if (glowVal > 0) {
        ctx.filter = `blur(${glowVal}px)`;
        ctx.globalCompositeOperation = 'screen';
        ctx.globalAlpha = 0.5;
        ctx.drawImage(canvas, 0, 0);
        ctx.filter = 'none';
        ctx.globalCompositeOperation = 'source-over';
        ctx.globalAlpha = 1.0;
      }
      
      if (sharpness > 0.15) {
        // Apply convolution for sharpness
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const data = imageData.data;
        const width = imageData.width;
        const height = imageData.height;
        
        const s = 1 + sharpness * 2;
        const kernel = [0, -1*s, 0, -1*s, 5*s, -1*s, 0, -1*s, 0];
        
        const tempData = new Uint8ClampedArray(data);
        
        for (let y = 1; y < height - 1; y++) {
          for (let x = 1; x < width - 1; x++) {
            let r = 0, g = 0, b = 0;
            
            for (let ky = -1; ky <= 1; ky++) {
              for (let kx = -1; kx <= 1; kx++) {
                const idx = ((y + ky) * width + (x + kx)) * 4;
                const weight = kernel[(ky + 1) * 3 + (kx + 1)];
                
                r += tempData[idx] * weight;
                g += tempData[idx + 1] * weight;
                b += tempData[idx + 2] * weight;
              }
            }
            
            const idx = (y * width + x) * 4;
            data[idx] = Math.min(255, Math.max(0, r));
            data[idx + 1] = Math.min(255, Math.max(0, g));
            data[idx + 2] = Math.min(255, Math.max(0, b));
          }
        }
        
        ctx.putImageData(imageData, 0, 0);
      }
    }

    // Fallback CPU-based processing for browsers without WebGL support
    function applyCPUFilters() {
      if (!videoReady) return;
      
      // Draw video to canvas
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      
      // Get image data
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      const data = imageData.data;
      const width = imageData.width;
      const height = imageData.height;
      
      // Get slider values
      const vibrance = (Number(sliders.vibrance.value) - 100) / 100;   // -1..+1
      const highlights = (Number(sliders.highlights.value) - 100) / 100;
      const shadows = (Number(sliders.shadows.value) - 100) / 100;
      const whitepoint = Number(sliders.whitepoint.value) / 100; // 0..2
      const blackpoint = Number(sliders.blackpoint.value) / 100; // 0..2
      const exposure = (Number(sliders.exposure.value) - 100) / 100; // -1..+1
      const sharpness = (Number(sliders.sharpness.value) - 100) / 100; // -1..+1
      const blurVal = Number(sliders.blur.value);
      const glowVal = Number(sliders.glow.value);
      const vignetteVal = Number(sliders.vignette.value) / 200;
      const rgbSplitVal = Number(sliders.rgbsplit.value);
      
      // Apply color adjustments
      for (let i = 0; i < data.length; i += 4) {
        let r = data[i];
        let g = data[i + 1];
        let b = data[i + 2];
        
        // Apply exposure
        r = r * (1 + exposure);
        g = g * (1 + exposure);
        b = b * (1 + exposure);
        
        // Apply contrast based on highlights
        const contrastFactor = 1 + (highlights * 0.3);
        r = ((r / 255 - 0.5) * contrastFactor + 0.5) * 255;
        g = ((g / 255 - 0.5) * contrastFactor + 0.5) * 255;
        b = ((b / 255 - 0.5) * contrastFactor + 0.5) * 255;
        
        // Apply vibrance (selective saturation)
        const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
        const sat = (vibrance > 0) ? 1 + vibrance * 0.8 : 1 + vibrance * 0.5;
        r = gray + sat * (r - gray);
        g = gray + sat * (g - gray);
        b = gray + sat * (b - gray);
        
        // Apply white point
        if (whitepoint !== 1) {
          const wp = 1 + (whitepoint - 1) * 0.25;
          r = r * wp;
          g = g * wp;
          b = b * wp;
        }
        
        // Apply black point
        if (blackpoint !== 1) {
          const bp = 1 - (1 - blackpoint) * 0.25;
          r = r * bp;
          g = g * bp;
          b = b * bp;
        }
        
        // Apply shadows (darken mid-tones)
        if (shadows < 0) {
          const shadowFactor = Math.max(-shadows * 0.2, 0);
          const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
          r = r * (1 - shadowFactor) + gray * shadowFactor;
          g = g * (1 - shadowFactor) + gray * shadowFactor;
          b = b * (1 - shadowFactor) + gray * shadowFactor;
        }
        
        // Apply vignette
        if (vignetteVal > 0) {
          const x = (i / 4) % width;
          const y = Math.floor((i / 4) / width);
          const centerX = width / 2;
          const centerY = height / 2;
          const maxDist = Math.sqrt(centerX * centerX + centerY * centerY);
          const dist = Math.sqrt((x - centerX) * (x - centerX) + (y - centerY) * (y - centerY));
          const vignette = 1 - (dist / maxDist) * vignetteVal;
          
          r = r * vignette;
          g = g * vignette;
          b = b * vignette;
        }
        
        // Clamp values
        data[i] = Math.min(255, Math.max(0, r));
        data[i + 1] = Math.min(255, Math.max(0, g));
        data[i + 2] = Math.min(255, Math.max(0, b));
      }
      
      // Put filtered image back
      ctx.putImageData(imageData, 0, 0);
      
      // Apply CSS filters for effects that are expensive to compute
      const filters = [];
      if (blurVal > 0) filters.push(`blur(${blurVal}px)`);
      if (rgbSplitVal > 0) {
        // RGB split can be simulated with CSS
        filters.push(`contrast(200%) saturate(0%)`);
      }
      if (glowVal > 0) {
        filters.push(`contrast(120%) brightness(110%)`);
      }
      
      if (filters.length > 0) {
        ctx.filter = filters.join(' ');
        ctx.drawImage(canvas, 0, 0);
        ctx.filter = 'none';
      }
    }

    // Process and render video frame
    function processFrame() {
      if (!videoReady || video.paused || video.ended) return;
      
      // Use GPU processing if available, otherwise fall back to CPU
      if (gpu && filterKernel) {
        applyGPUFilters();
      } else {
        applyCPUFilters();
      }
      
      // Continue processing frames
      animationFrame = requestAnimationFrame(processFrame);
    }

    // init camera
    async function startCamera() {
      try {
        // Clean up any existing stream
        if (stream) {
          stream.getTracks().forEach(track => track.stop());
        }
        
        // Get user media
        stream = await navigator.mediaDevices.getUserMedia({ 
          video: { 
            width: { ideal: 800 },
            height: { ideal: 600 },
            facingMode: 'user'
          }, 
          audio: false 
        });
        
        // Set video source
        video.srcObject = stream;
        
        // Wait for video to be ready
        video.addEventListener('loadeddata', async () => {
          try {
            await video.play();
            
            // Wait a bit for the video to actually start playing
            await new Promise(resolve => setTimeout(resolve, 500));
            
            // Check if video is actually playing
            if (video.paused || video.ended || video.readyState < 2) {
              throw new Error('Video is not playing properly');
            }
            
            videoReady = true;
            
            // Initialize GPU.js if not already done
            if (!gpu) {
              initGPU();
            }
            
            // Start processing frames
            processFrame();
            
            console.log('Camera initialized successfully');
          } catch (err) {
            console.error('Error playing video:', err);
            alert('Could not play video from camera: ' + err.message);
          }
        });
        
        // Handle video errors
        video.addEventListener('error', (e) => {
          console.error('Video error:', e);
          alert('Video error occurred. Please check camera permissions.');
        });
        
      } catch (err) {
        console.error('Camera error:', err);
        alert('Could not access the camera. Make sure you allowed permission and are on localhost or HTTPS. Error: ' + err.message);
      }
    }

    // reset
    resetButton.addEventListener('click', () => {
      // reset all sliders to default 100 (or 0 where appropriate)
      ['vibrance','highlights','shadows','whitepoint','blackpoint','sharpness','exposure'].forEach(id => sliders[id].value = 100);
      sliders.blur.value = 0;
      sliders.glow.value = 0;
      sliders.vignette.value = 100;
      sliders.rgbsplit.value = 0;
    });

    // layout change
    changeLayoutButton.addEventListener('click', () => {
      currentLayout = (currentLayout + 1) % layouts.length;
      layoutOverlay.style.backgroundImage = layouts[currentLayout] ? `url('${layouts[currentLayout]}')` : '';
    });

    // Helper to safely merge overlay and export as DataURL
    async function mergeOverlayToCanvas(baseCanvas, overlayUrl) {
    const merged = document.createElement('canvas');
    merged.width = baseCanvas.width;
    merged.height = baseCanvas.height;
    const ctx = merged.getContext('2d');

    ctx.drawImage(baseCanvas, 0, 0);

    if (overlayUrl) {
        try {
        const img = new Image();
        img.crossOrigin = 'anonymous'; // <--- IMPORTANT
        const overlayLoaded = new Promise((resolve, reject) => {
            img.onload = resolve;
            img.onerror = reject;
        });
        img.src = overlayUrl + (overlayUrl.includes('?') ? '&' : '?') + 'cachebust=' + Date.now();
        await overlayLoaded;
        ctx.drawImage(img, 0, 0, merged.width, merged.height);
        } catch (err) {
        console.warn('Overlay failed to load, skipping:', err);
        }
    }

    return merged;
    }

    saveButton.addEventListener('click', async () => {
      if (!videoReady) {
        return alert('Camera not ready yet.');
      }

      try {
        cancelAnimationFrame(animationFrame);

        const tempCanvas = document.createElement('canvas');
        tempCanvas.width = canvas.width;
        tempCanvas.height = canvas.height;
        const tempCtx = tempCanvas.getContext('2d');
        tempCtx.drawImage(canvas, 0, 0);

        // Merge with overlay
        const finalCanvas = await mergeOverlayToCanvas(tempCanvas, layouts[currentLayout] || null);
        const blob = await new Promise(resolve => finalCanvas.toBlob(resolve, 'image/png'));

        const formData = new FormData();
        const filename = `pudobooth_${Date.now()}.png`;
        formData.append('file', blob, filename);

        const response = await fetch('/drive/upload', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        });

        if (!response.ok) throw new Error(`Upload failed with status ${response.status}`);
        const result = await response.json();

        alert(`✅ Uploaded successfully!\n📂 File: ${result.name}\n🔗 ${result.webViewLink}`);
        animationFrame = requestAnimationFrame(processFrame);
      } catch (err) {
        console.error('Upload error:', err);
        alert('Failed to upload to Google Drive: ' + err.message);
      }
    });

    // Shoot: show preview with current rendered image (including overlay)
    shootButton.addEventListener('click', async () => {
      if (!videoReady) {
        console.log('Camera not ready. VideoReady:', videoReady);
        return alert('Camera not ready yet.');
      }
      
      try {
        // Create a temporary canvas for the current frame
        const tempCanvas = document.createElement('canvas');
        tempCanvas.width = canvas.width;
        tempCanvas.height = canvas.height;
        const tempCtx = tempCanvas.getContext('2d');
        
        // Copy the current canvas content
        tempCtx.drawImage(canvas, 0, 0);
        
        const overlayUrl = layouts[currentLayout] || null;
        const finalCanvas = await mergeOverlayToCanvas(tempCanvas, overlayUrl);
        const dataUrl = finalCanvas.toDataURL('image/png');
        
        // Show in modal
        previewImage.src = dataUrl;
        previewModal.style.display = 'flex';
      } catch (e) {
        console.error('Shoot error:', e);
        alert('Failed to capture image.');
      }
    });

    // Close preview modal
    closePreview.addEventListener('click', () => {
      previewModal.style.display = 'none';
    });

    // Clean up function to stop camera when page unloads
    window.addEventListener('beforeunload', () => {
      if (stream) {
        stream.getTracks().forEach(track => track.stop());
      }
      if (animationFrame) {
        cancelAnimationFrame(animationFrame);
      }
      if (gpu) {
        gpu.destroy();
      }
    });

    // start
    startCamera();
  </script>
</x-layout>