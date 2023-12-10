<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Demo</title>
</head>
<body>
    <ul id="messages"></ul>

    <script>
        const socket = new WebSocket('wss://adrmrk.site:8080');
        socket.addEventListener('message', function (event) {
            const messages = document.getElementById('messages');
            const li = document.createElement('li');
            li.appendChild(document.createTextNode(event.data));
            messages.appendChild(li);
        });
    </script>
</body>
</html>
