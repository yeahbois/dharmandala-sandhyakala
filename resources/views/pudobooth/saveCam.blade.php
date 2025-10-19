<x-layout title="OSIS MPK MHT">      
  <x-slot:metadesc>      
    <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">      
    <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">      
    <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">      
    <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">      
  </x-slot:metadesc>      
  <div class="flex flex-col min-h-screen bg-gray-100 w-full" style="margin: 0; padding: 0; overflow-x: hidden;">  
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">PudoBooth Camera (GPU Filters)</h1>  
      
    <!-- Main layout: camera left, controls right -->  
    <div class="flex flex-col lg:flex-row w-full gap-6 justify-start items-start" style="margin: 0; padding: 0 10px; width: 100vw;">  
      <!-- Camera container: full width on small screens, 2/3 on large screens -->  
      <div id="camera-container" class="relative w-full lg:w-2/3 h-[600px] rounded-lg overflow-hidden shadow-lg">  
        <video id="camera-feed" autoplay playsinline class="absolute top-0 left-0 w-full h-full object-cover" style="transform: scaleX(-1);"></video>  
        <canvas id="camera-canvas" class="absolute top-0 left-0 w-full h-full"></canvas>  
        <img id="frame-overlay"
        src="https://raw.githubusercontent.com/yeahbois/photobooth/main/FRAME%20TSF.png" 
        class="absolute top-0 left-0 w-full h-full pointer-events-none" crossorigin="anonymous">    
        <!-- Loading overlay -->  
        <div id="loading-overlay" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">  
          <div class="text-white text-center">  
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-white mx-auto mb-4"></div>  
            <div class="text-xl">Uploading to Google Drive...</div>  
          </div>  
        </div>  
      </div>  
      <!-- Controls container -->  
      <div id="controls" class="w-full lg:w-1/3 bg-white rounded-xl shadow-md p-6 flex flex-col gap-6">  
        <div class="grid grid-cols-2 gap-4">  
          <div><label class="block text-sm font-medium">Vibrance</label><input id="vibrance" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Highlights</label><input id="highlights" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Shadows</label><input id="shadows" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">White Point</label><input id="whitepoint" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Black Point</label><input id="blackpoint" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Sharpness</label><input id="sharpness" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Exposure</label><input id="exposure" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Blur</label><input id="blur" type="range" min="0" max="20" value="0" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Glow</label><input id="glow" type="range" min="0" max="20" value="0" class="w-full"></div>  
          <div><label class="block text-sm font-medium">Vignette</label><input id="vignette" type="range" min="0" max="200" value="100" class="w-full"></div>  
          <div><label class="block text-sm font-medium">RGB Split</label><input id="rgbsplit" type="range" min="0" max="40" value="0" class="w-full"></div>  
        </div>  
        
        <!-- Preset buttons -->
        <div class="grid grid-cols-3 gap-2">
          <button id="preset1-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 1</button>
          <button id="preset2-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 2</button>
          <button id="preset3-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 3</button>
        </div>
        
        <div class="flex justify-center">  
          <button id="shoot-button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md w-full">Shoot</button>  
        </div>  
      </div>  
    </div>  
  </div>  
  <script src="https://cdn.jsdelivr.net/npm/gpu.js@latest/dist/gpu-browser.min.js"></script>  
  <script>  
    // elements  
    const video = document.getElementById('camera-feed');  
    const canvas = document.getElementById('camera-canvas');  
    const ctx = canvas.getContext('2d');  
    const frameOverlay = document.getElementById('frame-overlay');  
    const shootButton = document.getElementById('shoot-button');  
    const loadingOverlay = document.getElementById('loading-overlay');  
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
    let isProcessing = false; // Flag to prevent multiple simultaneous shoots  
    let frameOverlayLoaded = false; // Track if frame overlay is loaded  
    // sliders  
    const sliders = {};  
    ['vibrance','highlights','shadows','whitepoint','blackpoint','sharpness','exposure','blur','glow','vignette','rgbsplit']  
      .forEach(id => sliders[id] = document.getElementById(id));  
      
    // Preset buttons
    const preset1Btn = document.getElementById('preset1-btn');
    const preset2Btn = document.getElementById('preset2-btn');
    const preset3Btn = document.getElementById('preset3-btn');
    
    // Function to fetch and apply preset
    async function loadPreset(presetId) {
      try {
        const response = await fetch(`/api/admin/setting/pudobooth/preset/${presetId}`);
        
        if (!response.ok) {
          throw new Error(`Failed to load preset: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data.error) {
          throw new Error(data.error);
        }
        
        // Apply preset values to sliders
        const values = data.values || {};
        
        // Default values for sliders if not specified in preset
        const defaultValues = {
          vibrance: 100,
          highlights: 100,
          shadows: 100,
          whitepoint: 100,
          blackpoint: 100,
          sharpness: 100,
          exposure: 100,
          blur: 0,
          glow: 0,
          vignette: 100,
          rgbsplit: 0
        };
        
        // Update each slider with preset value or default
        Object.keys(sliders).forEach(sliderId => {
          const value = values[sliderId] !== undefined ? values[sliderId] : defaultValues[sliderId];
          sliders[sliderId].value = value;
        });
        
        // Show success message
        console.log(`Preset ${presetId} loaded successfully`);
        
      } catch (error) {
        console.error('Error loading preset:', error);
        alert(`Failed to load preset: ${error.message}`);
      }
    }
    
    // Add event listeners to preset buttons
    preset1Btn.addEventListener('click', () => loadPreset(1));
    preset2Btn.addEventListener('click', () => loadPreset(2));
    preset3Btn.addEventListener('click', () => loadPreset(3));
    
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
        
      // Draw video to temporary canvas with horizontal flip to unmirror it  
      tempCtx.save();  
      tempCtx.scale(-1, 1);  
      tempCtx.drawImage(video, -tempCanvas.width, 0, tempCanvas.width, tempCanvas.height);  
      tempCtx.restore();  
        
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
        
      // Draw video to canvas with horizontal flip to unmirror it  
      ctx.save();  
      ctx.scale(-1, 1);  
      ctx.drawImage(video, -canvas.width, 0, canvas.width, canvas.height);  
      ctx.restore();  
        
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
    // Optimized capture function - directly captures what's shown in the preview  
    function captureCurrentFrame() {  
      return new Promise((resolve) => {  
        // Create a new canvas to capture the current view  
        const captureCanvas = document.createElement('canvas');  
        captureCanvas.width = canvas.width;  
        captureCanvas.height = canvas.height;  
        const captureCtx = captureCanvas.getContext('2d');  
          
        // Draw the current canvas content (with filters applied)  
        captureCtx.drawImage(canvas, 0, 0);  
          
        // Load and draw the frame overlay  
        const frameImg = new Image();  
        frameImg.crossOrigin = 'Anonymous';  
          
        frameImg.onload = () => {  
          // Draw the frame overlay on top  
          captureCtx.drawImage(frameImg, 0, 0, captureCanvas.width, captureCanvas.height);  
          resolve(captureCanvas);  
        };  
          
        // If the frame overlay has already loaded, use it directly  
        if (frameOverlayLoaded) {  
          frameImg.src = frameOverlay.src;  
        } else {  
          // Otherwise, wait for it to load  
          frameOverlay.onload = () => {  
            frameOverlayLoaded = true;  
            frameImg.src = frameOverlay.src;  
          };  
          // Start loading the frame overlay  
          frameImg.src = frameOverlay.src;  
        }  
      });  
    }  
    // Upload to Google Drive  
    async function uploadToGoogleDrive() {  
      if (!videoReady) {  
        return alert('Camera not ready yet.');  
      }  
        
      try {  
        // Show loading overlay  
        loadingOverlay.classList.remove('hidden');  
          
        // Capture the current frame with the frame overlay  
        const captureCanvas = await captureCurrentFrame();  
          
        // Convert to blob with higher quality but smaller size  
        const blob = await new Promise(resolve => {  
          captureCanvas.toBlob(resolve, 'image/jpeg', 0.85);  
        });  
          
        // Create a simple form data object  
        const formData = new FormData();  
        const filename = `pudobooth_${Date.now()}.jpg`;  
        formData.append('file', blob, filename);  
          
        // Add timeout to the fetch request  
        const controller = new AbortController();  
        const timeoutId = setTimeout(() => controller.abort(), 30000); // 30 second timeout  
          
        try {  
          const response = await fetch('/pudobooth/upload', {  
            method: 'POST',  
            body: formData,  
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },  
            signal: controller.signal  
          });  
            
          clearTimeout(timeoutId);  
            
          if (!response.ok) {  
            const errorText = await response.text();  
            throw new Error(`Upload failed with status ${response.status}: ${errorText}`);  
          }  
            
          const result = await response.json();  
            
          // Hide loading overlay  
          loadingOverlay.classList.add('hidden');  
            
          alert(`✅ Uploaded successfully!\n📂 File: ${result.name}\n🔗 ${result.webViewLink}`);  
        } catch (fetchError) {  
          clearTimeout(timeoutId);  
          throw fetchError;  
        }  
      } catch (err) {  
        console.error('Upload error:', err);  
        loadingOverlay.classList.add('hidden');  
          
        if (err.name === 'AbortError') {  
          alert('Upload timed out. Please try again.');  
        } else {  
          alert('Failed to upload to Google Drive: ' + err.message);  
        }  
      } finally {  
        // Resume camera processing  
        animationFrame = requestAnimationFrame(processFrame);  
      }  
    }  
    // Shoot button click handler  
    shootButton.addEventListener('click', () => {  
      if (!videoReady || isProcessing) {  
        return;  
      }  
        
      isProcessing = true;  
      shootButton.disabled = true;  
        
      // Stop camera processing  
      cancelAnimationFrame(animationFrame);  
        
      // Directly capture and upload the image  
      uploadToGoogleDrive().finally(() => {  
        isProcessing = false;  
        shootButton.disabled = false;  
      });  
    });  
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