<?php
// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$register_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dışarıdan atanacak değişkenler - sefer_id artık register formundan gelmiyor
    // Bu değer, Yolcular tablosunda NULL olarak veya bir sonraki işlemde atanacak şekilde ayarlanmalıdır.
    $kimlik_no = ''; // If kimlik_no is also not part of registration, consider making it NULL.
                     // For now, it's an empty string as per your original code.
    // $sefer_id artık register formundan gelmiyor, bu yüzden burada tanımlanmasına gerek yok
    // veya veritabanında NULL olarak kaydedilecekse null olarak ayarlanabilir.

    $name = htmlspecialchars(trim($_POST['name']));
    $surname = htmlspecialchars(trim($_POST['surname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    if ($password !== $confirm_password) {
        $register_message = '<div class="alert alert-danger">Şifreler uyuşmuyor. Lütfen tekrar deneyin.</div>';
    } else {
        // Veritabanına ekleme
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "otobus_sistemi";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        if ($conn->connect_error) {
            $register_message = '<div class="alert alert-danger">Veritabanı bağlantısı başarısız: ' . $conn->connect_error . '</div>';
        } else {
            // Aynı email ile kayıt var mı kontrolü
            $check = $conn->prepare("SELECT * FROM Yolcular WHERE email = ?");

            $check->bind_param("s", $email);
            $check->execute();
            $result = $check->get_result();

            if ($result->num_rows > 0) {
                $register_message = '<div class="alert alert-warning">Bu e-posta adresi zaten kayıtlı!</div>';
            } else {
                // IMPORTANT: Removed sefer_id from the INSERT statement and bind_param.
                // Ensure 'kimlik_no' can accept an empty string or NULL in your database.
                // If it's a numeric type (INT), you might need to change it to NULL or remove it too if not provided.
                $stmt = $conn->prepare("INSERT INTO Yolcular (kimlik_no, ad, soyad, telefon_numarasi, email, password) VALUES (?, ?, ?, ?, ?, ?)");
                // The 's' for kimlik_no is based on your original code, assuming it's a string type (VARCHAR).
                $stmt->bind_param("ssssss", $kimlik_no, $name, $surname, $phone, $email, $password);

                if ($stmt->execute()) {
                    $register_message = '<div class="alert alert-success">Kayıt başarılı! Giriş yapabilirsiniz.</div>';
                } else {
                    $register_message = '<div class="alert alert-danger">Kayıt sırasında bir hata oluştu: ' . $stmt->error . '</div>';
                }
                $stmt->close();
            }
            $check->close();
            $conn->close();
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