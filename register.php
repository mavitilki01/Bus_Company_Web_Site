<?php
$register_message = ''; // Kayıt mesajı için değişken

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Basit bir örnek için kullanıcıları bir metin dosyasına kaydediyoruz.
    // Gerçek uygulamada bu kısmı veritabanı ile değiştirmelisiniz.
    $user_data = $email . ":" . $password . "\n";
    $file = 'valid_users.txt'; // Kullanıcı bilgilerini saklayacağımız dosya

    // Dosyanın yazılabilir olup olmadığını kontrol et
    if (!is_writable($file) && file_exists($file)) {
        $register_message = '<div class="alert alert-danger" role="alert">Kayıt dosyasına yazılamıyor. Dosya izinlerini kontrol edin.</div>';
    } elseif (!file_exists($file) && !touch($file)) {
        $register_message = '<div class="alert alert-danger" role="alert">Kayıt dosyası oluşturulamıyor. Dizin izinlerini kontrol edin.</div>';
    } else {
        // Aynı e-postanın zaten kayıtlı olup olmadığını kontrol et (basit kontrol)
        $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $email_exists = false;
        foreach ($users as $user_line) {
            list($stored_email, $stored_password) = explode(':', $user_line);
            if ($stored_email === $email) {
                $email_exists = true;
                break;
            }
        }

        if ($email_exists) {
            $register_message = '<div class="alert alert-warning" role="alert">Bu e-posta adresi zaten kayıtlı!</div>';
        } else {
            if (file_put_contents($file, $user_data, FILE_APPEND | LOCK_EX) !== false) {
                $register_message = '<div class="alert alert-success" role="alert">Kaydınız başarıyla oluşturuldu! Şimdi giriş yapabilirsiniz.</div>';
                // İsterseniz kayıt sonrası giriş sayfasına yönlendirebilirsiniz
                // header("Location: login.php");
                // exit();
            } else {
                $register_message = '<div class="alert alert-danger" role="alert">Kayıt sırasında bir hata oluştu. Lütfen tekrar deneyin.</div>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otobüs Firması - Kayıt Ol</title>
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
        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-container h2 {
            color: #28a745; /* Yeşil renk kayıt başlığı için */
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
        }
        .btn-link:hover {
            text-decoration: underline;
        }
        .alert {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Kayıt Ol</h2>
        <?php
        // Kayıt mesajı varsa göster
        if ($register_message) {
            echo $register_message;
        }
        ?>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">E-posta Adresi (Gmail)</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="ornek@gmail.com"
                       value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Şifrenizi Belirleyin" minlength="6">
            </div>
            <button type="submit" class="btn btn-success">Kayıt Ol</button>
            <a href="login.php" class="btn btn-link">Zaten hesabınız var mı? Giriş Yap</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>