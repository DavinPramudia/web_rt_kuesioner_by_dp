<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kusioner Kepuasan RT</title>
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
        }

        .popup-content {
            position: relative;
            width: 80%;
            max-width: 700px;
            height: 80%;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .popup-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            cursor: pointer;
            z-index: 10;
        }
    </style>
</head>
<body>

<header>
    <h1>Kusioner Kepuasan RT</h1>
    <p>
        Selamat datang di kusioner kepuasan RT. Silakan isi
        kusioner berikut untuk memberikan masukan dan penilaian terhadap pelayanan RT di lingkungan Anda.
    </p>
</header>

<main class="container_start">
    <a href="#" class="btn_start" onclick="openPopup()">Mulai Kuesioner</a>
</main>

<footer>
    <p>&copy; 2026 Kusioner Kepuasan RT - Davin Pramudia & Team</p>
</footer>

<div class="popup" id="popupKuesioner">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <iframe src="kuesioner.php"></iframe>
    </div>
</div>

<script>
function openPopup() {
    document.getElementById("popupKuesioner").style.display = "block";
}

function closePopup() {
    document.getElementById("popupKuesioner").style.display = "none";
}
</script>

</body>
</html>