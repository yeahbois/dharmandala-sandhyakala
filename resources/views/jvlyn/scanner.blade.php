<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVLYN Scanner | Panitia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="w-screen h-screen flex flex-col bg-[#0B1220] text-white overflow-hidden">
    <!-- NAVBAR -->
    <header class="h-20 flex items-center justify-center bg-[#0F172A] border-b border-blue-900 shrink-0">
        <div class="text-center">
            <h1 class="text-xl font-semibold tracking-wide text-blue-400 uppercase">
                TICKET SCANNER JVLYN
            </h1>
            <p class="text-sm text-blue-200/70 uppercase tracking-widest">
                E-TICKETING SYSTEM BY OSPK M.H. THAMRIN
            </p>
        </div>
    </header>

    <!-- MAIN -->
    <main class="flex-1 min-h-0 w-full flex flex-col xl:flex-row">
        <!-- CAMERA -->
        <section class="relative flex-1 min-h-0 w-full bg-black overflow-hidden border border-blue-900">
            <div id="qr-reader" class="absolute inset-0"></div>

            <!-- SCANNER FRAME -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-[70vmin] h-[70vmin] max-w-[90%] max-h-[90%] rounded-2xl border-4 border-blue-500 shadow-[0_0_40px_#3B82F6]"></div>
            </div>

            <!-- HOT ALERT -->
            <div id="scan-alert" class="hidden absolute top-5 left-1/2 -translate-x-1/2 px-6 py-3 rounded-xl text-sm font-semibold shadow-xl z-50">
            </div>
        </section>

        <!-- PANEL -->
        <aside class="w-full xl:w-[360px] shrink-0 flex flex-col justify-center gap-6 p-4 bg-[#0B1220]">
            <div class="bg-[#0F172A] border border-blue-900 rounded-2xl p-5">
                <p class="text-sm text-blue-300 mb-2">Sumber Kamera</p>
                <select id="camera-select" class="w-full p-3 rounded-xl bg-[#020617] border border-blue-900 outline-none text-white">
                    <option value="">Loading cameras...</option>
                </select>
            </div>

            <div id="last-scanned-container" class="hidden bg-[#0F172A] border border-blue-900 rounded-2xl p-4 space-y-4">
                <div>
                    <p class="text-[10px] uppercase font-bold text-blue-400 tracking-widest mb-1">Ticket ID</p>
                    <p id="last-scanned-text" class="font-mono text-sm break-words text-blue-100 font-bold"></p>
                </div>
                <div id="order-details-container" class="hidden space-y-3 pt-3 border-t border-blue-900/50">
                    <div>
                        <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Buyer Name</p>
                        <p id="info-name" class="text-xs font-semibold text-white"></p>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Email</p>
                            <p id="info-email" class="text-[10px] font-medium text-blue-100 truncate"></p>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Phone</p>
                            <p id="info-phone" class="text-[10px] font-medium text-blue-100"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Type</p>
                            <p id="info-type" class="text-[10px] font-medium text-blue-100 uppercase"></p>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Referral</p>
                            <p id="info-referral" class="text-[10px] font-medium text-blue-100"></p>
                        </div>
                    </div>
                    <div class="pt-2 border-t border-blue-900/30">
                        <p class="text-[9px] uppercase text-blue-300/60 font-bold tracking-wider">Scanned At</p>
                        <p id="info-scanned-at" class="text-[10px] font-medium text-blue-100"></p>
                        <p id="info-scanned-relative" class="text-[9px] italic text-blue-400 mt-0.5"></p>
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        const qrRegionId = "qr-reader";
        let html5QrCode = null;
        let scanningLock = false;

        const alertEl = document.getElementById('scan-alert');
        const cameraSelect = document.getElementById('camera-select');
        const lastScannedContainer = document.getElementById('last-scanned-container');
        const lastScannedText = document.getElementById('last-scanned-text');

        // Sounds (Optional: Replace with actual paths if available)
        const successAudio = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3');
        const errorAudio = new Audio('https://assets.mixkit.co/active_storage/sfx/2873/2873-preview.mp3');

        function showAlert(type, message) {
            alertEl.innerText = message;
            alertEl.className = `absolute top-5 left-1/2 -translate-x-1/2 px-6 py-3 rounded-xl text-sm font-semibold shadow-xl z-50 ${
                type === 'success' ? 'bg-green-600 text-white' : 'bg-red-600 text-white'
            }`;
            alertEl.classList.remove('hidden');
            setTimeout(() => alertEl.classList.add('hidden'), 2500);
        }

        async function handlePresent(decodedText) {
            const orderDetailsContainer = document.getElementById('order-details-container');
            const lastScannedContainer = document.getElementById('last-scanned-container');
            const lastScannedText = document.getElementById('last-scanned-text');

            orderDetailsContainer.classList.add('hidden');
            lastScannedContainer.classList.add('hidden');
            lastScannedText.innerText = decodedText;

            try {
                const res = await fetch(`/jvlyn/api/scan?qrString=${encodeURIComponent(decodedText)}`);
                const data = await res.json();

                if (data.status === 'berhasil') {
                    successAudio.play().catch(() => {});
                    showAlert('success', data.message);
                    lastScannedContainer.classList.remove('hidden');

                    if (data.order_info) {
                        lastScannedText.innerText = data.order_info.ticket_id;
                        document.getElementById('info-name').innerText = data.order_info.name;
                        document.getElementById('info-email').innerText = data.order_info.email;
                        document.getElementById('info-phone').innerText = data.order_info.phone;
                        document.getElementById('info-type').innerText = data.order_info.ticket_type;
                        document.getElementById('info-referral').innerText = data.order_info.referral_code;
                        document.getElementById('info-scanned-at').innerText = data.order_info.scanned_at;
                        document.getElementById('info-scanned-relative').innerText = data.order_info.scanned_relative;
                        orderDetailsContainer.classList.remove('hidden');
                    }
                } else {
                    lastScannedContainer.classList.remove('hidden');
                    if (data.order_info) {
                        lastScannedText.innerText = data.order_info.ticket_id;
                        document.getElementById('info-name').innerText = data.order_info.name;
                        document.getElementById('info-email').innerText = data.order_info.email;
                        document.getElementById('info-phone').innerText = data.order_info.phone;
                        document.getElementById('info-type').innerText = data.order_info.ticket_type;
                        document.getElementById('info-referral').innerText = data.order_info.referral_code;
                        document.getElementById('info-scanned-at').innerText = data.order_info.scanned_at;
                        document.getElementById('info-scanned-relative').innerText = data.order_info.scanned_relative;
                        orderDetailsContainer.classList.remove('hidden');
                    }
                    errorAudio.play().catch(() => {});
                    showAlert('error', data.message);
                }
            } catch (err) {
                errorAudio.play().catch(() => {});
                showAlert('error', "Server error / API unreachable");
            }
        }

        async function startScanner(deviceId) {
            if (html5QrCode) {
                await html5QrCode.stop().catch(() => {});
                await html5QrCode.clear();
            }

            html5QrCode = new Html5Qrcode(qrRegionId);

            await html5QrCode.start(
                { deviceId: { exact: deviceId } },
                { fps: 12, aspectRatio: 1 },
                async (decodedText) => {
                    if (scanningLock) return;
                    scanningLock = true;

                    lastScannedContainer.classList.remove('hidden');
                    lastScannedText.innerText = decodedText;

                    await handlePresent(decodedText);

                    setTimeout(() => { scanningLock = false; }, 1500);
                },
                () => {}
            );

            // Mirror + full cover fix
            setTimeout(() => {
                const video = document.querySelector("#qr-reader video");
                if (video) {
                    video.style.transform = "scaleX(-1)";
                    video.style.width = "100%";
                    video.style.height = "100%";
                    video.style.objectFit = "cover";
                }
            }, 300);
        }

        Html5Qrcode.getCameras().then(devices => {
            if (devices.length) {
                cameraSelect.innerHTML = '';
                devices.forEach(device => {
                    const option = document.createElement('option');
                    option.value = device.id;
                    option.text = device.label || `Camera ${cameraSelect.length + 1}`;
                    cameraSelect.appendChild(option);
                });

                cameraSelect.onchange = (e) => startScanner(e.target.value);
                startScanner(devices[0].id);
            } else {
                cameraSelect.innerHTML = '<option value="">No cameras found</option>';
            }
        }).catch(err => {
            cameraSelect.innerHTML = '<option value="">Error accessing cameras</option>';
        });
    </script>
</body>
</html>
