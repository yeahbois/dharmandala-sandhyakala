<div id="countdown" class="flex space-x-4 text-center justify-between text-slate-700">
    <div>
        <div id="days" class="text-5xl font-bold">--</div>
        <div class="text-lg uppercase">hari</div>
    </div>
    <div>
        <div id="hours" class="text-5xl font-bold">--</div>
        <div class="text-lg uppercase">jam</div>
    </div>
    <div>
        <div id="minutes" class="text-5xl font-bold">--</div>
        <div class="text-lg uppercase">menit</div>
    </div>
    <div>
        <div id="seconds" class="text-5xl font-bold">--</div>
        <div class="text-lg uppercase">detik</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const endDate = new Date("{{ $date }}").getTime();
        const countdown = document.getElementById('countdown');

        const updateCountdown = () => {
            const now = new Date().getTime();
            const timeLeft = endDate - now;

            if (timeLeft < 0) {
                countdown.innerHTML = '<div class="text-3xl text-red-500">Time expired!</div>';
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
</script>