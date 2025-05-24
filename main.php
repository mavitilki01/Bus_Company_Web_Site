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
                    <a href="seferler.php" class="login-button btn-sefer"><i class="fa-solid fa-ticket"></i> Seferleri Görüntüle</a>
                    <a href="login.php" class="login-button">
                    <i class="fa-solid fa-sign-in-alt"></i> Giriş Yap
                    </a>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div id="slideshow" class="center-block" style="margin: 20px;">
                <img src="Resimler/slayt/otobus3.jpg" class="img-responsive" alt="Otobüs Resmi 1">
                <img src="Resimler/slayt/otobus4.jpg" class="img-responsive" alt="Otobüs Resmi 2">
                <img src="https://plus.unsplash.com/premium_photo-1661963542752-9a8a1d72fb28?q=80&w=2070" class="img-responsive" alt="Otobüs Resmi 3"> 
                <img src="https://images.unsplash.com/photo-1719316663972-0696da2b47a3?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-responsive" alt="Otobüs Resmi 4"></div>
                <ul id="nav"></ul>
        </div>
    </div>
</div>


<script>
$(function() {
    $('#slideshow').cycle({
        fx: 'scrollLeft',
        speed: 'fast',
        timeout: 5000,
        pager: '#nav',
        slideExpr: 'img'
    });
});
</script>

<div id="hizmetlerimiz" class="container-fluid primary-section">
    <div class="container cok">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 duyuru-1">
                <div class="duyurular" onclick="window.location.href='arac.php'">
                    <div>LÜX ARAÇLARIMIZ</div>
                    <div>Türkiyenin her şehrine kaliteli otobüslerimizle hızlı ve rahatça ulaşım sağlayın.</div>
                    <a>İncele <span class="glyphicon glyphicon-arrow-right"></span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 duyuru-2">
                <div class="duyurular" onclick="window.location.href='subeler.php'">
                    <div>ŞUBELERİMİZ</div>
                    <div>Şubelerimizdeki güler yüzlü çalışanlarımızla işlemlerinizi yapar ve kolayca bize ulaşabilirsiniz.</div>
                    <a>İncele <span class="glyphicon glyphicon-arrow-right"></span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 duyuru-3">
                <div class="duyurular" onclick="window.location.href='hakkimizda.php'">
                    <div>BİZ KİMİZ?</div>
                    <div>KarTur hakkında merak ettiğiniz her şeyi buradan öğrenin.</div>
                    <a>İncele <span class="glyphicon glyphicon-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="container cok">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
        <div class="kutu-icerik">
        <i class="fa-solid fa-couch" style="font-size: 30px; color: #000000;"></i>
        <h3>Konfor</h3>
        <p><strong>Rahatınız ve güvenliğiniz için 2+1 araçlarımızla bu eşsiz yolculuğa hazırlanın.</strong> </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
      <div class="kutu-icerik">
        <i class="fa-solid fa-face-smile-wink" style="font-size: 30px; color: #000000;"></i>
        <h3>Güler Yüz</h3>
        <p><strong>Güler yüzlü personellerimiz size daha iyi hizmet vermek için hizmetinizde.</strong> </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
      <div class="kutu-icerik">
        <i class="fa-solid fa-plug" style="font-size: 30px; color: #000000;"></i>
        <h3>Priz</h3>
        <p><strong>Her koltukta bulunan 220V priz sayesinde sevdiklerinizle iletişiminiz kesilmez.</strong></p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
      <div class="kutu-icerik">
        <i class="fa-solid fa-wifi" style="font-size: 30px; color: #000000;"></i>
        <h3>WI-FI</h3>
        <p><strong>Seyahatiniz boyunca ücretsiz Wi-Fi ile internete kolayca bağlanmanın keyfini yaşayın.</strong> </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
      <div class="kutu-icerik">
        <i class="fa-solid fa-network-wired" style="font-size: 30px; color: #000000;"></i>
        <h3>USB</h3>
        <p><strong>USB seçeneği ile ister telefonunuzu ister belleğinizi bağlayıp kendi filminizi izleyin.</strong> </p>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 otobus-kutu">
      <div class="kutu-icerik">
        <i class="fa-solid fa-music" style="font-size: 30px; color: #000000;"></i>
        <h3>Müzik</h3>
        <p><strong>Koltuk arkası ekranlarınızda sizlere özel seçilmiş birbirinden güzel müzikler.</strong> </p>
      </div>
    </div>
  </div>
</div>

<section id="iletisim">
    <div class="bosluk" style="padding: 20px; color: white; text-align: center;">
        <h2>İletişim</h2>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; margin-top: 30px;">

            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3002.1571740883464!2d32.62271657566374!3d41.19654680781154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x408353329a493e5f%3A0x72358e6a634ef0cf!2zRXJnZW5la29uLCBLYXJhYsO8ayBPdG9nYXLEsSwgNzgyMDAgS2FyYWLDvGsgTWVya2V6L0thcmFiw7xr!5e0!3m2!1str!2str!4v1747756960812!5m2!1str!2str"
                width="500" 
                height="400" 
                style="border:0; border-radius: 10px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

            <div style="max-width: 400px; text-align: left;">
                <p><strong>Adres:</strong><br>
                Ergenekon, 78200 Karabük Merkez/Karabük</p>

                <p><strong>Telefon:</strong><br>
                +90 (370) 123 45 67</p>

                <p><strong>E-posta:</strong><br>
                kartur@site.com</p>

                <p><strong>Çalışma Saatleri:</strong><br>
                Pazartesi - Cuma: 09:00 - 18:00</p>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 alt-logo">
                <a href="main.php"><img src="Resimler/kartur_logo.png" class="img-responsive" alt="KARTUR Logo"></a> 
                <br>Copyright © 2024 KARTUR
            </div>
            <div class="col-xs-12 col-sm-6 alt-tel">
                <div class="row contact-info-item">
                    <div class="col-xs-3 col-sm-2 col-md-1"><i class="fa-solid fa-phone"></i></div>
                    <div class="col-xs-9 col-sm-10 col-md-11"><span>Tel</span><span>(0512) 345 67 89</span><br></div>
                </div>
                <div class="row contact-info-item">
                    <div class="col-xs-3 col-sm-2 col-md-1"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="col-xs-9 col-sm-10 col-md-11"><span>Adres</span><span>Ergenekon, 78200 Karabük Merkez/Karabük</span><br></div>
                </div>
                <div class="row contact-info-item">
                    <div class="col-xs-3 col-sm-2 col-md-1"><i class="fa-solid fa-envelope"></i></div>
                    <div class="col-xs-9 col-sm-10 col-md-11"><span>E-Posta</span><a href="mailto:info@kartur.com">info@kartur.com</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>