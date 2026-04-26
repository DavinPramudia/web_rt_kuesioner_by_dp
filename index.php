<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuesioner Kepuasan RT</title>
    <link rel="stylesheet" href="admin/css/style.css">
</head>
<body>

<header class="header">
    <h1 class="title">Kuesioner Kepuasan RT</h1>
    <p class="desc">
        Selamat datang di kuesioner kepuasan RT...
    </p>

    <div class="container_start">
        <a href="#" class="btn_start" onclick="openPopup()">Mulai Kuesioner</a>
    </div>
</header>


<footer class="footer">
    <p>&copy; 2026 Kuesioner Kepuasan RT - Davin Pramudia & Team</p>
</footer>

<!-- POPUP -->
<div class="popup" id="popupKuesioner">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <iframe src="kuesioner.php"></iframe>
    </div>
</div>

<script src="script/script.js"></script>

</body>
</html>
