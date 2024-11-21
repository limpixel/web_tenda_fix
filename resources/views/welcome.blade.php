<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Chatbot</title>
</head>
<body>
    <h1>Selamat Datang di Halaman Management</h1>
    <p>Chatbot tersedia di pojok kanan bawah untuk membantu Anda.</p>

    <!-- Tambahkan BotMan Web Widget -->
    <script>
        var botmanWidget = {
            frameEndpoint: '/botman/chat',
            introMessage: "👋 Selamat datang di sistem management! Ada yang bisa saya bantu?",
            title: "Bot Tenda",
            mainColor: "#009688",
            buttonText: "Chat dengan Bot",
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    
      
</body>
</html>
