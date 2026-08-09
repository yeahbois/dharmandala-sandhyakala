<x-layout title="PudoBooth Admin Settings">  
  <x-slot:metadesc>  
    <meta name="description" content="Kelola konfigurasi PudoBooth seperti Google Drive, Spreadsheet, dan Frame CDN.">  
    <meta property="og:title" content="PudoBooth Admin Settings">  
    <meta property="og:description" content="Halaman pengaturan untuk admin PudoBooth.">  
    <meta property="og:image" content="https://ospkmhthamrin.com/images/potrait/ospkfull.jpg">  
  </x-slot:metadesc>  
  <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center p-6">  
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg p-8 border border-gray-200">  
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">  
        &lt;PudoBooth Admin Settings&gt;  
      </h1>  
      <!-- Core Links -->  
      <form id="settings-form" class="space-y-6 mb-12">  
        <div>  
          <label for="driveLink" class="block text-sm font-medium text-gray-700 mb-2">  
            📁 PudoBooth Google Drive Link  
          </label>  
          <input type="url" id="driveLink" name="driveLink" placeholder="https://drive.google.com/..."  
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">  
          <div id="drive-status" class="mt-1 text-sm hidden"></div>  
        </div>  
        <div>  
          <label for="sheetLink" class="block text-sm font-medium text-gray-700 mb-2">  
            📊 PudoBooth Spreadsheet Link  
          </label>  
          <input type="url" id="sheetLink" name="sheetLink"  
            placeholder="https://docs.google.com/spreadsheets/..."  
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">  
          <div id="sheet-status" class="mt-1 text-sm hidden"></div>  
        </div>  
        <div>  
          <label for="frameCdn" class="block text-sm font-medium text-gray-700 mb-2">  
            🖼️ PudoBooth Frame CDN Link  
          </label>  
          <input type="url" id="frameCdn" name="frameCdn"  
            placeholder="https://cdn.example.com/pudobooth/frame.png"  
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">  
          <div id="frame-status" class="mt-1 text-sm hidden"></div>  
        </div>  
        <div class="flex justify-center pt-4">  
          <button type="button" id="save-settings-btn"  
            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">  
            Save Settings  
          </button>  
        </div>  
      </form>  
      <!-- Preset Section -->  
      <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">🎨 PudoBooth Preset Settings</h2>  
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">  
        @for ($i = 1; $i <= 3; $i++)  
        <div id="preset-{{ $i }}" class="w-full bg-white rounded-xl shadow-md p-6 flex flex-col gap-6 border border-gray-200">  
          <h3 class="text-lg font-semibold text-gray-700 text-center mb-2">Preset {{ $i }}</h3>  
          
          <!-- Camera Preview -->  
          <div class="relative h-[200px] rounded-lg overflow-hidden bg-gray-900 mb-4">  
            <video id="preview-video-{{ $i }}" autoplay playsinline class="absolute top-0 left-0 w-full h-full object-cover" style="transform: scaleX(-1);"></video>  
            <canvas id="preview-canvas-{{ $i }}" class="absolute top-0 left-0 w-full h-full"></canvas>  
            <img id="preview-frame-{{ $i }}" src="https://cdn.discordapp.com/attachments/887673617335345173/1428719000132522024/THAMFAM_LAYOUT.png?ex=68f385c1&is=68f23441&hm=596f7dea080816622e633d768962b9d609e46e2c442fc9656c4f0c03f1a45bf8&" class="absolute top-0 left-0 w-full h-full pointer-events-none" crossorigin="anonymous">  
            <div id="preview-loading-{{ $i }}" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">  
              <div class="text-white text-center">  
                <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-white mx-auto mb-2"></div>  
                <div class="text-sm">Initializing Camera...</div>  
              </div>  
            </div>  
          </div>  
          
          <div class="grid grid-cols-2 gap-4">  
            <div><label class="block text-sm font-medium">Vibrance</label><input id="vibrance-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Highlights</label><input id="highlights-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Shadows</label><input id="shadows-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">White Point</label><input id="whitepoint-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Black Point</label><input id="blackpoint-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Sharpness</label><input id="sharpness-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Exposure</label><input id="exposure-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Blur</label><input id="blur-{{ $i }}" type="range" min="0" max="20" value="0" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Glow</label><input id="glow-{{ $i }}" type="range" min="0" max="20" value="0" class="w-full"></div>  
            <div><label class="block text-sm font-medium">Vignette</label><input id="vignette-{{ $i }}" type="range" min="0" max="200" value="100" class="w-full"></div>  
            <div><label class="block text-sm font-medium">RGB Split</label><input id="rgbsplit-{{ $i }}" type="range" min="0" max="40" value="0" class="w-full"></div>  
          </div>  
          <div class="flex justify-center">  
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md w-full transition save-preset-btn" data-preset="{{ $i }}">  
              Save Preset {{ $i }}  
            </button>  
          </div>  
        </div>  
        @endfor  
      </div>  
    </div>  
  </div>  
  <script src="https://cdn.jsdelivr.net/npm/gpu.js@latest/dist/gpu-browser.min.js"></script>  
  <script>  
    // Global variables for camera streams  
    let sharedStream = null;  
    let cameraInitialized = false;  
      
    // Initialize all camera previews  
    async function initializeCameras() {  
      if (cameraInitialized) return;  
        
      try {  
        // Get user media once and share it among all previews  
        sharedStream = await navigator.mediaDevices.getUserMedia({   
          video: {   
            width: { ideal: 800 },   
            height: { ideal: 600 },   
            facingMode: 'user'   
          },   
          audio: false   
        });  
          
        // Initialize each preset preview  
        for (let i = 1; i <= 3; i++) {  
          initializePresetPreview(i);  
        }  
          
        cameraInitialized = true;  
      } catch (err) {  
        console.error('Camera initialization error:', err);  
        // Hide all loading overlays and show error message  
        for (let i = 1; i <= 3; i++) {  
          const loadingOverlay = document.getElementById(`preview-loading-${i}`);  
          if (loadingOverlay) {  
            loadingOverlay.innerHTML = `  
              <div class="text-white text-center">  
                <div class="text-sm">Camera access denied</div>  
              </div>  
            `;  
          }  
        }  
      }  
    }  
      
    // Initialize a single preset preview  
    function initializePresetPreview(presetId) {  
      const video = document.getElementById(`preview-video-${presetId}`);  
      const canvas = document.getElementById(`preview-canvas-${presetId}`);  
      const ctx = canvas.getContext('2d');  
      const loadingOverlay = document.getElementById(`preview-loading-${presetId}`);  
      const frameOverlay = document.getElementById(`preview-frame-${presetId}`);  
        
      // Set canvas dimensions  
      canvas.width = 400;  
      canvas.height = 300;  
        
      // Set video source  
      video.srcObject = sharedStream;  
        
      // Wait for video to be ready  
      video.addEventListener('loadeddata', async () => {  
        try {  
          await video.play();  
            
          // Wait a bit for the video to actually start playing  
          await new Promise(resolve => setTimeout(resolve, 500));  
            
          // Hide loading overlay  
          loadingOverlay.classList.add('hidden');  
            
          // Start processing frames  
          processPresetFrame(presetId);  
        } catch (err) {  
          console.error(`Error playing video for preset ${presetId}:`, err);  
          loadingOverlay.innerHTML = `  
            <div class="text-white text-center">  
              <div class="text-sm">Video playback error</div>  
            </div>  
          `;  
        }  
      });  
        
      // Handle video errors  
      video.addEventListener('error', (e) => {  
        console.error(`Video error for preset ${presetId}:`, e);  
        loadingOverlay.innerHTML = `  
          <div class="text-white text-center">  
            <div class="text-sm">Video error</div>  
          </div>  
        `;  
      });  
        
      // Add event listeners to sliders  
      const sliders = ['vibrance', 'highlights', 'shadows', 'whitepoint', 'blackpoint', 'sharpness', 'exposure', 'blur', 'glow', 'vignette', 'rgbsplit'];  
      sliders.forEach(sliderId => {  
        const slider = document.getElementById(`${sliderId}-${presetId}`);  
        if (slider) {  
          slider.addEventListener('input', () => processPresetFrame(presetId));  
        }  
      });  
    }  
      
    // Process and render video frame for a preset  
    function processPresetFrame(presetId) {  
      const video = document.getElementById(`preview-video-${presetId}`);  
      const canvas = document.getElementById(`preview-canvas-${presetId}`);  
      const ctx = canvas.getContext('2d');  
      const frameOverlay = document.getElementById(`preview-frame-${presetId}`);  
        
      if (!video || video.paused || video.ended) return;  
        
      // Get slider values for this preset  
      const vibrance = (Number(document.getElementById(`vibrance-${presetId}`).value) - 100) / 100;  
      const highlights = (Number(document.getElementById(`highlights-${presetId}`).value) - 100) / 100;  
      const shadows = (Number(document.getElementById(`shadows-${presetId}`).value) - 100) / 100;  
      const whitepoint = Number(document.getElementById(`whitepoint-${presetId}`).value) / 100;  
      const blackpoint = Number(document.getElementById(`blackpoint-${presetId}`).value) / 100;  
      const exposure = (Number(document.getElementById(`exposure-${presetId}`).value) - 100) / 100;  
      const sharpness = (Number(document.getElementById(`sharpness-${presetId}`).value) - 100) / 100;  
      const blurVal = Number(document.getElementById(`blur-${presetId}`).value);  
      const glowVal = Number(document.getElementById(`glow-${presetId}`).value);  
      const vignetteVal = Number(document.getElementById(`vignette-${presetId}`).value) / 200;  
      const rgbSplitVal = Number(document.getElementById(`rgbsplit-${presetId}`).value);  
        
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
        
      // Continue processing frames  
      requestAnimationFrame(() => processPresetFrame(presetId));  
    }  
      
    // Function to save settings to API  
    async function saveSettings() {  
      const driveLink = document.getElementById('driveLink').value;  
      const sheetLink = document.getElementById('sheetLink').value;  
      const frameCdn = document.getElementById('frameCdn').value;  
      const saveBtn = document.getElementById('save-settings-btn');  
        
      // Disable button during save  
      saveBtn.disabled = true;  
      saveBtn.textContent = 'Saving...';  
        
      try {  
        // Save Drive URL  
        if (driveLink) {  
          const driveStatus = document.getElementById('drive-status');  
          driveStatus.classList.remove('hidden', 'text-green-600', 'text-red-600');  
          driveStatus.classList.add('text-blue-600');  
          driveStatus.textContent = 'Saving Drive URL...';  
            
          const driveResponse = await fetch(`/api/admin/setting/pudobooth/driveURL/${encodeURIComponent(driveLink)}`, {  
            method: 'POST',  
            headers: {  
              'X-CSRF-TOKEN': '{{ csrf_token() }}',  
              'Content-Type': 'application/json'  
            }  
          });  
            
          if (driveResponse.ok) {  
            driveStatus.classList.remove('text-blue-600');  
            driveStatus.classList.add('text-green-600');  
            driveStatus.textContent = 'Drive URL saved successfully!';  
          } else {  
            driveStatus.classList.remove('text-blue-600');  
            driveStatus.classList.add('text-red-600');  
            driveStatus.textContent = 'Failed to save Drive URL';  
          }  
        }  
          
        // Save Spreadsheet URL  
        if (sheetLink) {  
          const sheetStatus = document.getElementById('sheet-status');  
          sheetStatus.classList.remove('hidden', 'text-green-600', 'text-red-600');  
          sheetStatus.classList.add('text-blue-600');  
          sheetStatus.textContent = 'Saving Spreadsheet URL...';  
            
          const sheetResponse = await fetch(`/api/admin/setting/pudobooth/spreadsheetURL/${encodeURIComponent(sheetLink)}`, {  
            method: 'POST',  
            headers: {  
              'X-CSRF-TOKEN': '{{ csrf_token() }}',  
              'Content-Type': 'application/json'  
            }  
          });  
            
          if (sheetResponse.ok) {  
            sheetStatus.classList.remove('text-blue-600');  
            sheetStatus.classList.add('text-green-600');  
            sheetStatus.textContent = 'Spreadsheet URL saved successfully!';  
          } else {  
            sheetStatus.classList.remove('text-blue-600');  
            sheetStatus.classList.add('text-red-600');  
            sheetStatus.textContent = 'Failed to save Spreadsheet URL';  
          }  
        }  
          
        // Save Frame URL  
        if (frameCdn) {  
          const frameStatus = document.getElementById('frame-status');  
          frameStatus.classList.remove('hidden', 'text-green-600', 'text-red-600');  
          frameStatus.classList.add('text-blue-600');  
          frameStatus.textContent = 'Saving Frame URL...';  
            
          const frameResponse = await fetch(`/api/admin/setting/pudobooth/frameURL/${encodeURIComponent(frameCdn)}`, {  
            method: 'POST',  
            headers: {  
              'X-CSRF-TOKEN': '{{ csrf_token() }}',  
              'Content-Type': 'application/json'  
            }  
          });  
            
          if (frameResponse.ok) {  
            frameStatus.classList.remove('text-blue-600');  
            frameStatus.classList.add('text-green-600');  
            frameStatus.textContent = 'Frame URL saved successfully!';  
          } else {  
            frameStatus.classList.remove('text-blue-600');  
            frameStatus.classList.add('text-red-600');  
            frameStatus.textContent = 'Failed to save Frame URL';  
          }  
        }  
      } catch (error) {  
        console.error('Error saving settings:', error);  
        alert('An error occurred while saving settings. Please try again.');  
      } finally {  
        // Re-enable button  
        saveBtn.disabled = false;  
        saveBtn.textContent = 'Save Settings';  
      }  
    }  
      
    // Function to save preset  
    async function savePreset(presetId) {  
      const saveBtn = document.querySelector(`.save-preset-btn[data-preset="${presetId}"]`);  
        
      // Disable button during save  
      saveBtn.disabled = true;  
      saveBtn.textContent = 'Saving...';  
        
      try {  
        // Collect all slider values for this preset  
        const presetData = {};  
        const sliders = ['vibrance', 'highlights', 'shadows', 'whitepoint', 'blackpoint', 'sharpness', 'exposure', 'blur', 'glow', 'vignette', 'rgbsplit'];  
          
        sliders.forEach(sliderId => {  
          const slider = document.getElementById(`${sliderId}-${presetId}`);  
          if (slider) {  
            presetData[sliderId] = slider.value;  
          }  
        });  
          
        // Send preset data to API  
        const response = await fetch(`/api/admin/setting/pudobooth/preset/${presetId}`, {  
          method: 'POST',  
          headers: {  
            'X-CSRF-TOKEN': '{{ csrf_token() }}',  
            'Content-Type': 'application/json'  
          },  
          body: JSON.stringify(presetData)  
        });  
          
        if (response.ok) {  
          const result = await response.json();  
          if (result.success) {  
            saveBtn.textContent = 'Saved!';  
            setTimeout(() => {  
              saveBtn.textContent = `Save Preset ${presetId}`;  
            }, 2000);  
          } else {  
            saveBtn.textContent = 'No changes';  
            setTimeout(() => {  
              saveBtn.textContent = `Save Preset ${presetId}`;  
            }, 2000);  
          }  
        } else {  
          saveBtn.textContent = 'Failed!';  
          setTimeout(() => {  
            saveBtn.textContent = `Save Preset ${presetId}`;  
          }, 2000);  
        }  
      } catch (error) {  
        console.error(`Error saving preset ${presetId}:`, error);  
        saveBtn.textContent = 'Error!';  
        setTimeout(() => {  
          saveBtn.textContent = `Save Preset ${presetId}`;  
        }, 2000);  
      } finally {  
        // Re-enable button  
        saveBtn.disabled = false;  
      }  
    }  
      
    // Function to load current settings from API  
    async function loadCurrentSettings() {  
      try {  
        // Load Drive URL  
        const driveResponse = await fetch('/api/admin/setting/pudobooth/driveURL', {  
          method: 'GET',  
          headers: {  
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  
          }  
        });  
          
        if (driveResponse.ok) {  
          const driveData = await driveResponse.json();  
          if (driveData.url) {  
            document.getElementById('driveLink').value = driveData.url;  
          }  
        }  
          
        // Load Spreadsheet URL  
        const sheetResponse = await fetch('/api/admin/setting/pudobooth/spreadsheetURL', {  
          method: 'GET',  
          headers: {  
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  
          }  
        });  
          
        if (sheetResponse.ok) {  
          const sheetData = await sheetResponse.json();  
          if (sheetData.url) {  
            document.getElementById('sheetLink').value = sheetData.url;  
          }  
        }  
          
        // Load Frame URL  
        const frameResponse = await fetch('/api/admin/setting/pudobooth/frameURL', {  
          method: 'GET',  
          headers: {  
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  
          }  
        });  
          
        if (frameResponse.ok) {  
          const frameData = await frameResponse.json();  
          if (frameData.url) {  
            document.getElementById('frameCdn').value = frameData.url;  
            // Update frame overlay in all previews  
            for (let i = 1; i <= 3; i++) {  
              const frameOverlay = document.getElementById(`preview-frame-${i}`);  
              if (frameOverlay) {  
                frameOverlay.src = frameData.url;  
              }  
            }  
          }  
        }  
          
        // Load presets  
        for (let i = 1; i <= 3; i++) {  
          const presetResponse = await fetch(`/api/admin/setting/pudobooth/preset/${i}`, {  
            method: 'GET',  
            headers: {  
              'X-CSRF-TOKEN': '{{ csrf_token() }}'  
            }  
          });  
            
          if (presetResponse.ok) {  
            const presetData = await presetResponse.json();  
            if (presetData.values) {  
              Object.keys(presetData.values).forEach(sliderId => {  
                const slider = document.getElementById(`${sliderId}-${i}`);  
                if (slider && presetData.values[sliderId]) {  
                  slider.value = presetData.values[sliderId];  
                }  
              });  
            }  
          }  
        }  
      } catch (error) {  
        console.error('Error loading settings:', error);  
      }  
    }  
      
    // Clean up function to stop camera when page unloads  
    window.addEventListener('beforeunload', () => {  
      if (sharedStream) {  
        sharedStream.getTracks().forEach(track => track.stop());  
      }  
    });  
      
    // Initialize page when DOM is loaded  
    document.addEventListener('DOMContentLoaded', () => {  
      // Load current settings  
      loadCurrentSettings();  
        
      // Initialize cameras  
      initializeCameras();  
        
      // Add event listener for save settings button  
      document.getElementById('save-settings-btn').addEventListener('click', saveSettings);  
        
      // Add event listeners for preset save buttons  
      document.querySelectorAll('.save-preset-btn').forEach(btn => {  
        btn.addEventListener('click', () => {  
          const presetId = btn.getAttribute('data-preset');  
          savePreset(presetId);  
        });  
      });  
    });  
  </script>  
</x-layout>
