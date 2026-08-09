<x-layout title="OSIS MPK MHT">      
  <x-slot:metadesc>      
    <meta name="description" content="Klik sekarang untuk menemukan kegiatan seru, proyek keren, dan cara ikut berkontribusi!">      
    <meta property="og:title" content="Beranda OSIS MPK SMA Negeri Unggulan M. H. Thamrin 2024/2025">      
    <meta property="og:description" content="Cari tahu event terbaru OSIS MPK MHT dan ikut berkontribusi dalam kegiatan sekolah!">      
    <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">      
  </x-slot:metadesc>      

  <div class="flex flex-col min-h-screen bg-gray-100 w-full" style="margin: 0; padding: 0; overflow-x: hidden;">  
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">PudoBooth Camera (GPU Filters)</h1>  

    <!-- Main layout: image preview left, controls right -->  
    <div class="flex flex-col lg:flex-row w-full gap-6 justify-start items-start" style="margin: 0; padding: 0 10px; width: 100vw;">  
      <!-- Image preview container -->  
      <div id="camera-container" class="relative w-full lg:w-2/3 h-[600px] rounded-lg overflow-hidden shadow-lg bg-gray-200 flex items-center justify-center">  
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
        <!-- Upload prompt -->
        <div id="upload-prompt" class="text-gray-600 text-center z-10">
          <p class="mb-2">Upload a photo to apply filters</p>
          <input type="file" id="image-upload" accept="image/png, image/jpeg" class="block mx-auto" multiple>
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
          <div><label class="block text-sm font-medium">Vignette</label><input id="vignette" type="range" min="0" max="200" value="0" class="w-full"></div>  
          <div><label class="block text-sm font-medium">RGB Split</label><input id="rgbsplit" type="range" min="0" max="40" value="0" class="w-full"></div>  
        </div>  

        <!-- Preset buttons -->
        <div class="grid grid-cols-3 gap-2">
          <button id="preset1-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 1</button>
          <button id="preset2-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 2</button>
          <button id="preset3-btn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-3 rounded-md text-sm">Preset 3</button>
        </div>

        <!-- Filename display -->
        <div id="filename-display" class="text-sm text-gray-600 italic text-center min-h-[24px]">
          Loading filename...
        </div>

        <div class="flex justify-center">  
          <button id="shoot-button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md w-full" disabled>Shoot</button>  
        </div>  
      </div>  
    </div>  
  </div>  

  <script src="https://cdn.jsdelivr.net/npm/gpu.js@latest/dist/gpu-browser.min.js"></script>  
  <script>  
    // Elements
    const canvas = document.getElementById('camera-canvas');
    const ctx = canvas.getContext('2d');
    const frameOverlay = document.getElementById('frame-overlay');
    const shootButton = document.getElementById('shoot-button');
    const loadingOverlay = document.getElementById('loading-overlay');
    const uploadInput = document.getElementById('image-upload');
    const uploadPrompt = document.getElementById('upload-prompt');

    // Set canvas dimensions
    canvas.width = 800;
    canvas.height = 600;

    // State
    let originalImage = null;
    let gpu = null;
    let filterKernel = null;
    let tempCanvas = null;
    let tempCtx = null;
    let isProcessing = false;
    let frameOverlayLoaded = false;

    // Sliders
    const sliders = {};
    ['vibrance','highlights','shadows','whitepoint','blackpoint','sharpness','exposure','blur','glow','vignette','rgbsplit']
      .forEach(id => sliders[id] = document.getElementById(id));

    // Preset buttons
    const preset1Btn = document.getElementById('preset1-btn');
    const preset2Btn = document.getElementById('preset2-btn');
    const preset3Btn = document.getElementById('preset3-btn');

    // Load preset function (same as before)
    async function loadPreset(presetId) {
      try {
        const response = await fetch(`/api/admin/setting/pudobooth/preset/${presetId}`);
        if (!response.ok) throw new Error(`Failed to load preset: ${response.status}`);
        const data = await response.json();
        if (data.error) throw new Error(data.error);

        const defaultValues = {
          vibrance: 100, highlights: 100, shadows: 100, whitepoint: 100,
          blackpoint: 100, sharpness: 100, exposure: 100, blur: 0,
          glow: 0, vignette: 100, rgbsplit: 0
        };

        Object.keys(sliders).forEach(sliderId => {
          const value = data.values?.[sliderId] ?? defaultValues[sliderId];
          sliders[sliderId].value = value;
        });

        if (originalImage) applyFilters(); // Re-apply if image is loaded
      } catch (error) {
        console.error('Error loading preset:', error);
        alert(`Failed to load preset: ${error.message}`);
      }
    }

    preset1Btn.addEventListener('click', () => loadPreset(1));
    preset2Btn.addEventListener('click', () => loadPreset(2));
    preset3Btn.addEventListener('click', () => loadPreset(3));

    // GPU.js init (same as before)
    function initGPU() {
      try {
        gpu = new GPU();
        tempCanvas = document.createElement('canvas');
        tempCanvas.width = canvas.width;
        tempCanvas.height = canvas.height;
        tempCtx = tempCanvas.getContext('2d');
        createFilterKernel();
        return true;
      } catch (e) {
        console.error('GPU init failed:', e);
        alert('WebGL not supported. Using CPU fallback.');
        return false;
      }
    }

    function createFilterKernel() {
      filterKernel = gpu.createKernel(function(image, vibrance, highlights, shadows, whitepoint, blackpoint, exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal) {
        const pixel = image[this.thread.y][this.thread.x];
        let r = pixel[0], g = pixel[1], b = pixel[2];

        r = r * (1.0 + exposure);
        g = g * (1.0 + exposure);
        b = b * (1.0 + exposure);

        const contrastFactor = 1.0 + (highlights * 0.3);
        r = ((r / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;
        g = ((g / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;
        b = ((b / 255.0 - 0.5) * contrastFactor + 0.5) * 255.0;

        const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
        const sat = (vibrance > 0.0) ? 1.0 + vibrance * 0.8 : 1.0 + vibrance * 0.5;
        r = gray + sat * (r - gray);
        g = gray + sat * (g - gray);
        b = gray + sat * (b - gray);

        if (whitepoint !== 1.0) {
          const wp = 1.0 + (whitepoint - 1.0) * 0.25;
          r *= wp; g *= wp; b *= wp;
        }

        if (blackpoint !== 1.0) {
          const bp = 1.0 - (1.0 - blackpoint) * 0.25;
          r *= bp; g *= bp; b *= bp;
        }

        if (shadows < 0.0) {
          const shadowFactor = Math.max(-shadows * 0.2, 0.0);
          const gray2 = 0.2989 * r + 0.5870 * g + 0.1140 * b;
          r = r * (1.0 - shadowFactor) + gray2 * shadowFactor;
          g = g * (1.0 - shadowFactor) + gray2 * shadowFactor;
          b = b * (1.0 - shadowFactor) + gray2 * shadowFactor;
        }

        if (vignetteVal > 0.0) {
          const x = this.thread.x;
          const y = this.thread.y;
          const centerX = this.constants.width / 2.0;
          const centerY = this.constants.height / 2.0;
          const maxDist = Math.sqrt(centerX * centerX + centerY * centerY);
          const dist = Math.sqrt((x - centerX) ** 2 + (y - centerY) ** 2);
          const vignette = 1.0 - (dist / maxDist) * vignetteVal;
          r *= vignette; g *= vignette; b *= vignette;
        }

        r = Math.min(255, Math.max(0, r));
        g = Math.min(255, Math.max(0, g));
        b = Math.min(255, Math.max(0, b));

        this.color(r, g, b, pixel[3]);
      })
      .setOutput([canvas.width, canvas.height])
      .setGraphical(true)
      .setConstants({ width: canvas.width, height: canvas.height });
    }

    // Apply filters (GPU or CPU)
    function applyFilters() {
    if (!originalImage) return;

    // Step 1: Draw clean base image
    drawBaseImage();

    // Step 2: If GPU is ready, use it. Otherwise, skip advanced filtering.
    const vibrance = (Number(sliders.vibrance.value) - 100) / 100;
    const highlights = (Number(sliders.highlights.value) - 100) / 100;
    const shadows = (Number(sliders.shadows.value) - 100) / 100;
    const whitepoint = Number(sliders.whitepoint.value) / 100;
    const blackpoint = Number(sliders.blackpoint.value) / 100;
    const exposure = (Number(sliders.exposure.value) - 100) / 100;
    const sharpness = (Number(sliders.sharpness.value) - 100) / 100;
    const blurVal = Number(sliders.blur.value);
    const glowVal = Number(sliders.glow.value);
    const vignetteVal = Number(sliders.vignette.value) / 200;
    const rgbSplitVal = Number(sliders.rgbsplit.value);

    // Only apply GPU/CPU filters if at least one non-default value is used
    const isDefault = (
      vibrance === 0 && highlights === 0 && shadows === 0 &&
      whitepoint === 1 && blackpoint === 1 && exposure === 0 &&
      sharpness === 0 && blurVal === 0 && glowVal === 0 &&
      vignetteVal === 0.5 && rgbSplitVal === 0
    );

    if (!isDefault && gpu && filterKernel) {
      // Use GPU path
      tempCtx.clearRect(0, 0, tempCanvas.width, tempCanvas.height);
      tempCtx.drawImage(originalImage, 0, 0, tempCanvas.width, tempCanvas.height);

      const imageData = tempCtx.getImageData(0, 0, tempCanvas.width, tempCanvas.height);
      const pixels = [];
      for (let y = 0; y < tempCanvas.height; y++) {
        const row = [];
        for (let x = 0; x < tempCanvas.width; x++) {
          const idx = (y * tempCanvas.width + x) * 4;
          row.push([imageData.data[idx], imageData.data[idx+1], imageData.data[idx+2], imageData.data[idx+3]]);
        }
        pixels.push(row);
      }

      const filteredCanvas = filterKernel(
        pixels, vibrance, highlights, shadows, whitepoint, blackpoint,
        exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal
      );

      // Clear and draw filtered result
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(filteredCanvas, 0, 0);
    } else if (!isDefault) {
      // CPU fallback: apply directly on main canvas image data
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      applyCPUFiltersToImageData(
        imageData, vibrance, highlights, shadows, whitepoint, blackpoint,
        exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal
      );
      ctx.putImageData(imageData, 0, 0);
    }

    // Apply post-effects (blur, glow, RGB split) — these work on canvas
    let needsRedraw = false;
    const currentCanvas = document.createElement('canvas');
    currentCanvas.width = canvas.width;
    currentCanvas.height = canvas.height;
    const currentCtx = currentCanvas.getContext('2d');
    currentCtx.drawImage(canvas, 0, 0);

    if (blurVal > 0) {
      ctx.filter = `blur(${blurVal}px)`;
      ctx.drawImage(currentCanvas, 0, 0);
      ctx.filter = 'none';
      needsRedraw = true;
    }

    if (rgbSplitVal > 0) {
      ctx.globalCompositeOperation = 'screen';
      ctx.globalAlpha = 0.5;
      ctx.drawImage(currentCanvas, rgbSplitVal / 2, 0);
      ctx.globalCompositeOperation = 'multiply';
      ctx.drawImage(currentCanvas, -rgbSplitVal / 2, 0);
      ctx.globalCompositeOperation = 'source-over';
      ctx.globalAlpha = 1.0;
      needsRedraw = true;
    }

    if (glowVal > 0) {
      ctx.filter = `blur(${glowVal}px)`;
      ctx.globalCompositeOperation = 'screen';
      ctx.globalAlpha = 0.5;
      ctx.drawImage(currentCanvas, 0, 0);
      ctx.filter = 'none';
      ctx.globalCompositeOperation = 'source-over';
      ctx.globalAlpha = 1.0;
      needsRedraw = true;
    }

    if (sharpness > 0.15) {
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      sharpenImageData(imageData, sharpness);
      ctx.putImageData(imageData, 0, 0);
      needsRedraw = true;
    }
  }

    function drawBaseImage() {
    if (!originalImage) return;
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // Scale image to fit canvas while preserving aspect ratio
    const img = originalImage;
    const hRatio = canvas.width / img.width;
    const vRatio = canvas.height / img.height;
    const ratio = Math.min(hRatio, vRatio);
    const centerShiftX = (canvas.width - img.width * ratio) / 2;
    const centerShiftY = (canvas.height - img.height * ratio) / 2;

    ctx.drawImage(
      img,
      0, 0, img.width, img.height,
      centerShiftX, centerShiftY, img.width * ratio, img.height * ratio
    );
  }

    // CPU filter helper
    function applyCPUFiltersToImageData(imageData, vibrance, highlights, shadows, whitepoint, blackpoint, exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal) {
      const data = imageData.data;
      const width = imageData.width;
      const height = imageData.height;

      for (let i = 0; i < data.length; i += 4) {
        let r = data[i], g = data[i+1], b = data[i+2];

        r *= (1 + exposure); g *= (1 + exposure); b *= (1 + exposure);

        const contrastFactor = 1 + (highlights * 0.3);
        r = ((r / 255 - 0.5) * contrastFactor + 0.5) * 255;
        g = ((g / 255 - 0.5) * contrastFactor + 0.5) * 255;
        b = ((b / 255 - 0.5) * contrastFactor + 0.5) * 255;

        const gray = 0.2989 * r + 0.5870 * g + 0.1140 * b;
        const sat = (vibrance > 0) ? 1 + vibrance * 0.8 : 1 + vibrance * 0.5;
        r = gray + sat * (r - gray);
        g = gray + sat * (g - gray);
        b = gray + sat * (b - gray);

        if (whitepoint !== 1) {
          const wp = 1 + (whitepoint - 1) * 0.25;
          r *= wp; g *= wp; b *= wp;
        }

        if (blackpoint !== 1) {
          const bp = 1 - (1 - blackpoint) * 0.25;
          r *= bp; g *= bp; b *= bp;
        }

        if (shadows < 0) {
          const shadowFactor = Math.max(-shadows * 0.2, 0);
          const gray2 = 0.2989 * r + 0.5870 * g + 0.1140 * b;
          r = r * (1 - shadowFactor) + gray2 * shadowFactor;
          g = g * (1 - shadowFactor) + gray2 * shadowFactor;
          b = b * (1 - shadowFactor) + gray2 * shadowFactor;
        }

        if (vignetteVal > 0) {
          const x = (i / 4) % width;
          const y = Math.floor((i / 4) / width);
          const centerX = width / 2;
          const centerY = height / 2;
          const maxDist = Math.sqrt(centerX*centerX + centerY*centerY);
          const dist = Math.sqrt((x - centerX)**2 + (y - centerY)**2);
          const vignette = 1 - (dist / maxDist) * vignetteVal;
          r *= vignette; g *= vignette; b *= vignette;
        }

        data[i] = Math.min(255, Math.max(0, r));
        data[i+1] = Math.min(255, Math.max(0, g));
        data[i+2] = Math.min(255, Math.max(0, b));
      }
    }

    function sharpenImageData(imageData, sharpness) {
      const data = imageData.data;
      const width = imageData.width;
      const height = imageData.height;
      const s = 1 + sharpness * 2;
      const kernel = [0, -s, 0, -s, 5*s, -s, 0, -s, 0];
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
    }

    // Fetch filename from /queue API
    async function fetchFilename() {
        const filenameDisplay = document.getElementById('filename-display');
        try {
          const response = await fetch('/queue');
          if (!response.ok) throw new Error('Failed to fetch queue data');
          
          const data = await response.json();
          // ✅ Use 'nama', not 'name'
          if (Array.isArray(data) && data.length > 0 && data[0].nama) {
            window.uploadFilename = data[0].nama.trim() || 'pudobooth_photo';
          } else {
            window.uploadFilename = 'pudobooth_photo';
          }
          filenameDisplay.textContent = `📁 File will be saved as: ${window.uploadFilename}.jpg`;
        } catch (err) {
          console.warn('Could not load filename from /queue:', err);
          window.uploadFilename = 'pudobooth_photo';
          filenameDisplay.textContent = '📁 Using default filename';
        }
      }

    // Capture current view with frame
    async function captureHighResFrame() {
      return new Promise(async (resolve) => {
        if (!originalImage) return resolve(null);

        const exportSize = getExportSize(originalImage);
        const exportCanvas = document.createElement('canvas');
        exportCanvas.width = exportSize.width;
        exportCanvas.height = exportSize.height;
        const exportCtx = exportCanvas.getContext('2d');

        // Step 1: Draw original image at high res
        exportCtx.drawImage(originalImage, 0, 0, exportSize.width, exportSize.height);

        // Step 2: Apply filters via CPU (GPU not used for high-res)
        const imageData = exportCtx.getImageData(0, 0, exportSize.width, exportSize.height);
        const vibrance = (Number(sliders.vibrance.value) - 100) / 100;
        const highlights = (Number(sliders.highlights.value) - 100) / 100;
        const shadows = (Number(sliders.shadows.value) - 100) / 100;
        const whitepoint = Number(sliders.whitepoint.value) / 100;
        const blackpoint = Number(sliders.blackpoint.value) / 100;
        const exposure = (Number(sliders.exposure.value) - 100) / 100;
        const sharpness = (Number(sliders.sharpness.value) - 100) / 100;
        const blurVal = Number(sliders.blur.value);
        const glowVal = Number(sliders.glow.value);
        const vignetteVal = Number(sliders.vignette.value) / 200;
        const rgbSplitVal = Number(sliders.rgbsplit.value);

        // Apply base color filters
        applyCPUFiltersToImageData(
          imageData, vibrance, highlights, shadows, whitepoint, blackpoint,
          exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal
        );
        exportCtx.putImageData(imageData, 0, 0);

        // Apply post-effects that require canvas operations
        if (blurVal > 0 || glowVal > 0 || rgbSplitVal > 0 || sharpness > 0.15) {
          // For simplicity, we'll apply blur/glow via temporary canvas
          const temp = document.createElement('canvas');
          temp.width = exportSize.width;
          temp.height = exportSize.height;
          const tctx = temp.getContext('2d');
          tctx.drawImage(exportCanvas, 0, 0);

          // Blur
          if (blurVal > 0) {
            exportCtx.filter = `blur(${blurVal * (exportSize.width / 800)}px)`; // scale blur
            exportCtx.drawImage(temp, 0, 0);
            exportCtx.filter = 'none';
          }

          // RGB Split (scaled)
          if (rgbSplitVal > 0) {
            const offset = Math.max(1, Math.round(rgbSplitVal * (exportSize.width / 800) / 2));
            exportCtx.globalCompositeOperation = 'screen';
            exportCtx.globalAlpha = 0.5;
            exportCtx.drawImage(temp, offset, 0);
            exportCtx.globalCompositeOperation = 'multiply';
            exportCtx.drawImage(temp, -offset, 0);
            exportCtx.globalCompositeOperation = 'source-over';
            exportCtx.globalAlpha = 1.0;
          }

          // Glow
          if (glowVal > 0) {
            exportCtx.filter = `blur(${glowVal * (exportSize.width / 800)}px)`;
            exportCtx.globalCompositeOperation = 'screen';
            exportCtx.globalAlpha = 0.5;
            exportCtx.drawImage(temp, 0, 0);
            exportCtx.filter = 'none';
            exportCtx.globalCompositeOperation = 'source-over';
            exportCtx.globalAlpha = 1.0;
          }

          // Sharpness
          if (sharpness > 0.15) {
            const imgData = exportCtx.getImageData(0, 0, exportSize.width, exportSize.height);
            sharpenImageData(imgData, sharpness);
            exportCtx.putImageData(imgData, 0, 0);
          }
        }

        // Step 3: Load and draw frame at high resolution
        const frameImg = new Image();
        frameImg.crossOrigin = 'Anonymous';
        frameImg.onload = () => {
          exportCtx.drawImage(frameImg, 0, 0, exportSize.width, exportSize.height);
          resolve(exportCanvas);
        };
        frameImg.onerror = () => {
          console.warn('Frame failed to load, exporting without frame');
          resolve(exportCanvas);
        };
        frameImg.src = frameOverlay.src;
      });
    }

    function getExportSize(img) {
      const maxWidth = 6000;
      const maxHeight = 4000;
      const ratio = Math.min(maxWidth / img.width, maxHeight / img.height, 1); // don't upscale
      return {
        width: Math.floor(img.width * ratio),
        height: Math.floor(img.height * ratio)
      };
    }

    // Upload to Google Drive
    async function uploadToGoogleDrive() {
      try {
        loadingOverlay.classList.remove('hidden');
        
        const highResCanvas = await captureHighResFrame();
        if (!highResCanvas) throw new Error('No image to upload');

        // Use high quality (0.92) for large images
        const blob = await new Promise(resolve => 
          highResCanvas.toBlob(resolve, 'image/jpeg', 0.92)
        );

        const formData = new FormData();
        const safeName = (window.uploadFilename || 'pudobooth_photo').replace(/[^a-z0-9_-]/gi, '_');
        formData.append('file', blob, `${safeName}.jpg`);

        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 60000); // 60s timeout for large files

        const response = await fetch('/pudobooth/upload', {
          method: 'POST',
          body: formData,
          headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          signal: controller.signal
        });

        clearTimeout(timeoutId);
        if (!response.ok) throw new Error(`HTTP ${response.status}`);

        const result = await response.json();
        loadingOverlay.classList.add('hidden');
        alert(`✅ Uploaded successfully!\n📂 File: ${result.name}\n🔗 ${result.webViewLink}`);
      } catch (err) {
        loadingOverlay.classList.add('hidden');
        if (err.name === 'AbortError') {
          alert('Upload timed out. Please try again.');
        } else {
          alert('Upload failed: ' + (err.message || 'Unknown error'));
        }
      }
    }

    shootButton.addEventListener('click', async () => {
        if (isProcessing || !window.pendingFiles || window.pendingFiles.length === 0) return;

        isProcessing = true;
        shootButton.disabled = true;
        loadingOverlay.classList.remove('hidden');

        const files = window.pendingFiles;
        const baseName = window.uploadFilename || 'pudobooth_photo';
        let successCount = 0;

        for (let i = 0; i < files.length; i++) {
          try {
            // Create image object from file
            const file = files[i];
            const img = await new Promise((resolve, reject) => {
              const reader = new FileReader();
              reader.onload = (e) => {
                const image = new Image();
                image.onload = () => resolve(image);
                image.onerror = reject;
                image.src = e.target.result;
              };
              reader.onerror = reject;
              reader.readAsDataURL(file);
            });

            // Temporarily set as originalImage for processing
            const prevImage = originalImage;
            originalImage = img;

            // Re-apply filters for this image
            const exportSize = getExportSize(img);
            const exportCanvas = document.createElement('canvas');
            exportCanvas.width = exportSize.width;
            exportCanvas.height = exportSize.height;
            const exportCtx = exportCanvas.getContext('2d');
            exportCtx.drawImage(img, 0, 0, exportSize.width, exportSize.height);

            // Apply filters (same as in captureHighResFrame)
            const imageData = exportCtx.getImageData(0, 0, exportSize.width, exportSize.height);
            const vibrance = (Number(sliders.vibrance.value) - 100) / 100;
            const highlights = (Number(sliders.highlights.value) - 100) / 100;
            const shadows = (Number(sliders.shadows.value) - 100) / 100;
            const whitepoint = Number(sliders.whitepoint.value) / 100;
            const blackpoint = Number(sliders.blackpoint.value) / 100;
            const exposure = (Number(sliders.exposure.value) - 100) / 100;
            const sharpness = (Number(sliders.sharpness.value) - 100) / 100;
            const blurVal = Number(sliders.blur.value);
            const glowVal = Number(sliders.glow.value);
            const vignetteVal = Number(sliders.vignette.value) / 200;
            const rgbSplitVal = Number(sliders.rgbsplit.value);

            applyCPUFiltersToImageData(
              imageData, vibrance, highlights, shadows, whitepoint, blackpoint,
              exposure, sharpness, blurVal, glowVal, vignetteVal, rgbSplitVal
            );
            exportCtx.putImageData(imageData, 0, 0);

            // Apply post-effects
            if (blurVal > 0 || glowVal > 0 || rgbSplitVal > 0 || sharpness > 0.15) {
              const temp = document.createElement('canvas');
              temp.width = exportSize.width;
              temp.height = exportSize.height;
              const tctx = temp.getContext('2d');
              tctx.drawImage(exportCanvas, 0, 0);

              if (blurVal > 0) {
                exportCtx.filter = `blur(${blurVal * (exportSize.width / 800)}px)`;
                exportCtx.drawImage(temp, 0, 0);
                exportCtx.filter = 'none';
              }

              if (rgbSplitVal > 0) {
                const offset = Math.max(1, Math.round(rgbSplitVal * (exportSize.width / 800) / 2));
                exportCtx.globalCompositeOperation = 'screen';
                exportCtx.globalAlpha = 0.5;
                exportCtx.drawImage(temp, offset, 0);
                exportCtx.globalCompositeOperation = 'multiply';
                exportCtx.drawImage(temp, -offset, 0);
                exportCtx.globalCompositeOperation = 'source-over';
                exportCtx.globalAlpha = 1.0;
              }

              if (glowVal > 0) {
                exportCtx.filter = `blur(${glowVal * (exportSize.width / 800)}px)`;
                exportCtx.globalCompositeOperation = 'screen';
                exportCtx.globalAlpha = 0.5;
                exportCtx.drawImage(temp, 0, 0);
                exportCtx.filter = 'none';
                exportCtx.globalCompositeOperation = 'source-over';
                exportCtx.globalAlpha = 1.0;
              }

              if (sharpness > 0.15) {
                const imgData = exportCtx.getImageData(0, 0, exportSize.width, exportSize.height);
                sharpenImageData(imgData, sharpness);
                exportCtx.putImageData(imgData, 0, 0);
              }
            }

            // Apply frame
            const frameImg = new Image();
            await new Promise((resolve, reject) => {
              frameImg.crossOrigin = 'Anonymous';
              frameImg.onload = () => {
                exportCtx.drawImage(frameImg, 0, 0, exportSize.width, exportSize.height);
                resolve();
              };
              frameImg.onerror = () => {
                console.warn('Frame failed to load');
                resolve(); // continue without frame
              };
              frameImg.src = frameOverlay.src;
            });

            // Generate filename: base, base_2, base_3, etc.
            const safeBase = baseName.replace(/[^a-z0-9_-]/gi, '_');
            const fileName = i === 0 ? `${safeBase}.jpg` : `${safeBase}_${i + 1}.jpg`;

            // Convert to blob and upload
            const blob = await new Promise(resolve => 
              exportCanvas.toBlob(resolve, 'image/jpeg', 0.92)
            );

            const formData = new FormData();
            formData.append('file', blob, fileName);

            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 60000);

            const response = await fetch('/pudobooth/upload', {
              method: 'POST',
              body: formData,
              headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              signal: controller.signal
            });

            clearTimeout(timeoutId);
            if (response.ok) successCount++;

            // Restore original preview image
            originalImage = prevImage;
            if (originalImage) {
              drawBaseImage();
              applyFilters();
            }

          } catch (err) {
            console.error(`Failed to process file ${i + 1}:`, err);
          }
        }

        // Final UI update
        loadingOverlay.classList.add('hidden');
        isProcessing = false;
        shootButton.disabled = false;
        alert(`✅ ${successCount}/${files.length} photo(s) uploaded successfully!`);
      });

    // Handle image upload
    // Handle single or multiple image uploads
    uploadInput.addEventListener('change', (e) => {
      const files = Array.from(e.target.files);
      if (files.length === 0) return;

      // Reset UI
      uploadPrompt.classList.add('hidden');
      shootButton.disabled = true; // will enable after first image loads

      let loadedCount = 0;
      const total = files.length;

      files.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = (event) => {
          const img = new Image();
          img.crossOrigin = 'Anonymous';
          img.onload = () => {
            // For the FIRST image, set as preview and enable shoot
            if (index === 0) {
              originalImage = img;
              drawBaseImage();
              if (!gpu) initGPU();
              setTimeout(() => applyFilters(), 100);
              shootButton.disabled = false;
            }

            loadedCount++;
            if (loadedCount === total) {
              // Optional: show how many files loaded
              console.log(`✅ ${total} image(s) ready for processing`);
            }
          };
          img.onerror = () => {
            alert(`Failed to load image: ${file.name}`);
          };
          img.src = event.target.result;
        };
        reader.readAsDataURL(file);
      });

      // Store all files for batch upload
      window.pendingFiles = files;
    });

  Object.values(sliders).forEach(slider => {
    slider.addEventListener('input', () => {
      if (originalImage) applyFilters();
    });
  });

    // Initialize GPU if possible
    initGPU();
    fetchFilename();
  </script>  
</x-layout>
