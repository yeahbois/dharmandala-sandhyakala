<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PudoBooth - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>PudoBooth Admin Dashboard</h1>
    </div>

    {{-- This will render the queue component --}}
    <x-pudobooth.queue-admin />

</body>
</html>