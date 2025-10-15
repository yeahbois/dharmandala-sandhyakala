<style>
    .queue-container {
        max-width: 800px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .queue-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }
    .queue-header h2 {
        margin: 0;
        color: #333;
    }
    .queue-header span {
        font-size: 1.2em;
        font-weight: bold;
        color: #007bff;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
        color: #555;
    }
    tbody tr:hover {
        background-color: #f9f9f9;
    }
</style>

<div class="queue-container">
    <div class="queue-header">
        <h2>Current Queue</h2>
        <span>Total: 0</span>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
            {{-- This part will be populated by a loop from the backend later --}}
            <tr>
                <td colspan="4" style="text-align:center; color: #888;">Queue is currently empty.</td>
            </tr>
            <x-pudobooth.queue no="thomi"
                               nama="thomi"
                               kelas="thomi"
                               notelp="thomi"
            />
            <x-pudobooth.queue no="thomi"
                               nama="thomi"
                               kelas="thomi"
                               notelp="thomi"
            />
            <x-pudobooth.queue no="thomi"
                               nama="thomi"
                               kelas="thomi"
                               notelp="thomi"
            />
        </tbody>
    </table>
</div>