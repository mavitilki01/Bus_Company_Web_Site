<?php
$register_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    if ($password !== $confirm_password) {
        $register_message = '<div class="alert alert-danger">Şifreler uyuşmuyor. Lütfen tekrar deneyin.</div>';
    } else {
        $user_data = "$name:$surname:$phone:$email:$password\n";
        $file = 'valid_users.txt';

        if (!is_writable($file) && file_exists($file)) {
            $register_message = '<div class="alert alert-danger">Kayıt dosyasına yazılamıyor.</div>';
        } elseif (!file_exists($file) && !touch($file)) {
            $register_message = '<div class="alert alert-danger">Kayıt dosyası oluşturulamıyor.</div>';
        } else {
            $users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $email_exists = false;
            foreach ($users as $user_line) {
                $parts = explode(':', $user_line);
                if (count($parts) >= 4 && $parts[3] === $email) {
                    $email_exists = true;
                    break;
                }
            }

            if ($email_exists) {
                $register_message = '<div class="alert alert-warning">Bu e-posta adresi zaten kayıtlı!</div>';
            } else {
                if (file_put_contents($file, $user_data, FILE_APPEND | LOCK_EX) !== false) {
                    $register_message = '<div class="alert alert-success">Kayıt başarılı! Giriş yapabilirsiniz.</div>';
                } else {
                    $register_message = '<div class="alert alert-danger">Kayıt sırasında bir hata oluştu.</div>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
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
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }
        h2 {
            color: #28a745;
            text-align: center;
            margin-bottom: 25px;
        }
        .btn-success {
            width: 100%;
        }
        .btn-link {
            display: block;
            margin-top: 15px;
            text-align: center;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Kayıt Ol</h2>
    <?php echo $register_message; ?>
    <form action="register.php" method="POST">
        <div class="mb-3">
            <label class="form-label">İsim</label>
            <input type="text" name="name" class="form-control" required value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Soyisim</label>
            <input type="text" name="surname" class="form-control" required value="<?php echo isset($surname) ? htmlspecialchars($surname) : ''; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefon</label>
            <input type="tel" name="phone" class="form-control" required placeholder="05xx xxx xx xx" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Gmail</label>
            <input type="email" name="email" class="form-control" required placeholder="ornek@gmail.com" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Şifre</label>
            <input type="password" name="password" class="form-control" required minlength="6" placeholder="Şifrenizi Belirleyin">
        </div>
        <div class="mb-3">
            <label class="form-label">Şifre Tekrar</label>
            <input type="password" name="confirm_password" class="form-control" required minlength="6" placeholder="Şifrenizi Tekrar Girin">
        </div>
        <button type="submit" class="btn btn-success">Kayıt Ol</button>
        <a href="login.php" class="btn btn-link">Zaten hesabınız var mı? Giriş yap</a>
    </form>
</div>

</body>
</html>
