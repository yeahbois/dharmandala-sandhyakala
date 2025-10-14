<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PudoBooth - Queue</title>
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
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
        .queue-status {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Join the PudoBooth Queue</h1>
        <form action="#" method="POST">
            <!-- In a real Laravel app, you'd use @csrf here -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" id="kelas" name="kelas" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telp</label>
                <input type="tel" id="no_telp" name="no_telp" required>
            </div>
            <button type="submit">Submit</button>
        </form>
        <div class="queue-status">
            Current queue: 0
        </div>
    </div>

</body>
</html>