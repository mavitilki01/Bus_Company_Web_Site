<?php
session_start();

// Giriş başarılı mesajı varsa göster ve oturumdan sil
if (isset($_SESSION['login_success'])) {
    $login_message = '<div class="alert alert-success text-center" role="alert">' . $_SESSION['login_success'] . '</div>';
    unset($_SESSION['login_success']); // Mesajı bir kere gösterdikten sonra sil
}

// Kullanıcı giriş yapmışsa kontrol et
$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$user_email = $logged_in ? $_SESSION['user_email'] : null;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>KARTUR</title>
    <link rel="icon" href="Resimler/kartur_logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="keywords" content="otobüs, bilet, yolculuk, seyehat, sefer, şube" />
    <meta name="description" content="KarTur’la Her Yol, Evine Giden Yol" />
    <meta name="author" content="KARTUR">
    <meta name="robots" content="ALL" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="stil.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .login-button {
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            font-size: 1.2em;
            padding: 15px 30px;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            margin-bottom: 15px; /* Butonlar arası boşluk */
            background-color: #007bff; /* Varsayılan mavi */
            border: none;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background-color: #0056b3;
            color: white;
        }

        .btn-sefer {
            background-color: #28a745; /* Yeşil */
        }

        .btn-sefer:hover {
            background-color: #1e7e34; /* Koyu yeşil */
        }

        .btn-logout {
            background-color: #dc3545; /* Kırmızı */
        }

        .btn-logout:hover {
            background-color: #c82333; /* Koyu kırmızı */
        }

    </style>
</head>
<body>


<div class="container-fluid Banner">
    <div class="container"> <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7 logo">
                <a href="main.php"><img src="Resimler/kartur_logo.png" class="img-responsive" alt="KARTUR Logo"></a>
            </div>
            <div>
                <i><h3><i>"KarTur’la Her Yol, Evine Giden Yol." </i></h3> </i>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-default logo-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Navigasyonu aç/kapa</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="main.php">ANA SAYFA</a></li>
                    <li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
                    <li><a href="#hizmetlerimiz">HİZMETLERİMİZ</a></li>
                    <li><a href="#iletisim">İLETİŞİM</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container content-section">
    <div class="row main-content-row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center" style="display:flex; justify-content:center; align-items:center; min-height: 300px;">
            <div id="ticket-selection-container" class="well" style="max-width: 600px; width: 150%; margin-top: 100px;">
                <h3>Sefer Seç</h3>
                <?php if (isset($login_message)): ?>
                    <?php echo $login_message; ?>
                <?php endif; ?>
                <a href="seferler.php" class="login-button btn-sefer"><i class="fa-solid fa-ticket"></i> Seferleri Görüntüle</a>
                <?php if (!$logged_in): ?>
                    <?php else: ?>
                    <p class="text-success">Hoş geldiniz, <?php echo htmlspecialchars($user_email); ?>!</p>
                    <a href="logout.php" class="login-button btn-logout"><i class="fa-solid fa-sign-out-alt"></i> Çıkış Yap</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div id="slideshow" class="center-block" style="margin: 20px;">
                <img src="Resimler/slayt/otobus3.jpg" class="img-responsive" alt="Otobüs Resmi 1">
                <img src="Resimler/slayt/otobus4.jpg" class="img-responsive" alt="Otobüs Resmi 2">
                <img src="https://plus.unsplash.com/premium_photo-1661963542752-9a8a1d72fb28?