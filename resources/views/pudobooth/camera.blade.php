<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PudoBooth - Camera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        #camera-container {
            position: relative;
            width: 800px;
            height: 600px;
            border: 5px solid #333;
            background-color: #000;
        }
        #camera-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #layout-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            pointer-events: none;
        }
        #controls {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }
        .control-group {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="range"] {
            width: 150px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>PudoBooth Camera</h1>

    <div id="camera-container">
        <video id="camera-feed" autoplay playsinline style="display:none;"></video>
        <canvas id="camera-preview"></canvas>
        <div id="layout-overlay"></div>
    </div>

    <div id="controls">
        <div class="control-group">
            <label for="brightness">Brightness</label>
            <input type="range" id="brightness" min="0" max="200" value="100">
        </div>
        <div class="control-group">
            <label for="contrast">Contrast</label>
            <input type="range" id="contrast" min="0" max="200" value="100">
        </div>
        <div class="control-group">
            <label for="saturate">Saturation</label>
            <input type="range" id="saturate" min="0" max="200" value="100">
        </div>
        <div class="control-group">
            <label for="grayscale">Grayscale</label>
            <input type="range" id="grayscale" min="0" max="100" value="0">
        </div>
        <div class="control-group">
            <label for="sepia">Sepia</label>
            <input type="range" id="sepia" min="0" max="100" value="0">
        </div>
        <div class="control-group">
            <label for="invert">Invert</label>
            <input type="range" id="invert" min="0" max="100" value="0">
        </div>
        <button id="shoot-button">Shoot</button>
        <button id="save-button">Save Photo</button>
        <button id="change-layout-button">Change Layout</button>
    </div>

    <script>
        const video = document.getElementById('camera-feed');
        const canvas = document.getElementById('camera-preview');
        const context = canvas.getContext('2d');
        const controls = document.getElementById('controls');
        const shootButton = document.getElementById('shoot-button');
        const saveButton = document.getElementById('save-button');
        const changeLayoutButton = document.getElementById('change-layout-button');
        const layoutOverlay = document.getElementById('layout-overlay');

        const brightness = document.getElementById('brightness');
        const contrast = document.getElementById('contrast');
        const saturate = document.getElementById('saturate');
        const grayscale = document.getElementById('grayscale');
        const sepia = document.getElementById('sepia');
        const invert = document.getElementById('invert');

        let isStreaming = false;
        let capturedImage = null;

        // Set canvas dimensions
        canvas.width = 800;
        canvas.height = 600;

        // Access camera
        async function startCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { width: 800, height: 600 } });
                video.srcObject = stream;
                video.onloadedmetadata = () => {
                    isStreaming = true;
                    drawFrame();
                };
            } catch (err) {
                console.error("Error accessing camera: ", err);
                alert('Could not access the camera. Please allow camera access and try again.');
            }
        }

        // Draw video frame to canvas with filters
        function drawFrame() {
            if (!isStreaming) return;

            // Apply filters
            const filter = `
                brightness(${brightness.value}%)
                contrast(${contrast.value}%)
                saturate(${saturate.value}%)
                grayscale(${grayscale.value}%)
                sepia(${sepia.value}%)
                invert(${invert.value}%)
            `;
            context.filter = filter;

            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            requestAnimationFrame(drawFrame);
        }

        // Handle filter changes
        controls.addEventListener('input', () => {
            if (!isStreaming) {
                // if a photo was already shot, re-draw it with new filters
                if (capturedImage) {
                    drawCapturedImageWithFilters();
                }
            }
        });

        // Shoot photo
        shootButton.addEventListener('click', () => {
            if (isStreaming) {
                isStreaming = false; // Stop the live feed drawing
                capturedImage = document.createElement('canvas');
                capturedImage.width = canvas.width;
                capturedImage.height = canvas.height;
                const capturedContext = capturedImage.getContext('2d');
                capturedContext.drawImage(video, 0, 0, canvas.width, canvas.height); // Capture raw frame

                // Stop the camera stream
                const stream = video.srcObject;
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
                video.srcObject = null;

                drawCapturedImageWithFilters(); // Draw the captured image with the current filters
                shootButton.textContent = "Retake";
            } else {
                // Retake photo
                capturedImage = null;
                startCamera();
                shootButton.textContent = "Shoot";
            }
        });

        function drawCapturedImageWithFilters() {
            if (!capturedImage) return;
            const filter = `
                brightness(${brightness.value}%)
                contrast(${contrast.value}%)
                saturate(${saturate.value}%)
                grayscale(${grayscale.value}%)
                sepia(${sepia.value}%)
                invert(${invert.value}%)
            `;
            context.filter = filter;
            context.drawImage(capturedImage, 0, 0, canvas.width, canvas.height);
        }

        // Save photo
        saveButton.addEventListener('click', () => {
            if (!capturedImage) {
                alert("Please shoot a photo first!");
                return;
            }

            // Create a temporary canvas to merge the captured image and the layout
            const finalCanvas = document.createElement('canvas');
            finalCanvas.width = canvas.width;
            finalCanvas.height = canvas.height;
            const finalContext = finalCanvas.getContext('2d');

            // Draw the (filtered) captured image
            drawCapturedImageWithFilters(); // ensure canvas has the latest filters applied
            finalContext.drawImage(canvas, 0, 0);

            // If there is a layout, draw it on top
            if (layoutOverlay.style.backgroundImage) {
                const img = new Image();
                img.onload = () => {
                    finalContext.drawImage(img, 0, 0, finalCanvas.width, finalCanvas.height);
                    downloadImage(finalCanvas);
                };
                // Extract url from 'url("...")'
                img.src = layoutOverlay.style.backgroundImage.slice(5, -2);
            } else {
                downloadImage(finalCanvas);
            }
        });

        function downloadImage(canvasToDownload) {
            const link = document.createElement('a');
            link.download = 'pudobooth-photo.png';
            link.href = canvasToDownload.toDataURL('image/png');
            link.click();
        }

        // Change layout
        const layouts = [
            '', // No layout
            'https://via.placeholder.com/800x600/0000FF/808080?Text=Layout+1',
            'https://via.placeholder.com/800x600/FF0000/FFFFFF?Text=Layout+2',
            'https://via.placeholder.com/800x600/00FF00/000000?Text=Layout+3'
        ];
        let currentLayout = 0;
        changeLayoutButton.addEventListener('click', () => {
            currentLayout = (currentLayout + 1) % layouts.length;
            const layoutUrl = layouts[currentLayout];
            layoutOverlay.style.backgroundImage = layoutUrl ? `url('${layoutUrl}')` : '';
        });

        // Start the camera when the page loads
        startCamera();
    </script>

</body>
</html>