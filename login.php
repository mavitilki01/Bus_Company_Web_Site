<?php
session_start(); // Oturumu başlat
$login_error = ''; // Hata mesajı için değişken

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form gönderildiyse
    $email = htmlspecialchars(trim($_POST['email'])); // Güvenlik için temizle
    $password = htmlspecialchars(trim($_POST['password'])); // Şifre için temizle
    
    $valid_users = [
        [
            'email' => 'kullanici1@gmail.com',
            'password' => 'sifre123' // Düz metin şifre (sadece örnek için)
        ],
        [
            'email' => 'kullanici2@gmail.com',
            'password' => 'sifre456' // Düz metin şifre (sadece örnek için)
        ]
    ];
    // --- Örnek Kullanıcı Bilgileri Sonu ---

    $is_authenticated = false;
    foreach ($valid_users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) { // Şifre kontrolü
            $is_authenticated = true;
            break;
        }
    }

    if ($is_authenticated) {
        // Başarılı giriş
        $_SESSION['logged_in'] = true; // Oturum değişkenini ayarla
        $_SESSION['user_email'] = $email; // Kullanıcı e-postasını oturuma kaydet
        header("Location: welcome.php"); // Başarılı giriş sonrası yönlendirme sayfası
        exit();
    } else {
        // Başarısız giriş
        $login_error = "E-posta veya Şifre hatalı!";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otobüs Firması - Giriş</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            color: #007bff;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 15px; /* Added margin for spacing */
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .alert {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Giriş Yap</h2>
        <?php
        // Hata mesajı varsa göster
        if ($login_error) {
            echo '<div class="alert alert-danger" role="alert">' . $login_error . '</div>';
        }
        ?>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresi (Gmail)</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="ornek@gmail.com"
                        value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Şifreniz"
                        value="<?php echo isset($password) ? htmlspecialchars($password) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
            <a href="register.php" class="btn btn-secondary">Kayıt Ol</a> </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>