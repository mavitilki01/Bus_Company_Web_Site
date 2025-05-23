<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kimlik_no = $_POST["kimlik_no"];
    $sefer_id = $_POST["sefer_id"];
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $telefon = $_POST["telefon"];
    $email = $_POST["email"];

    $sql = "INSERT INTO Yolcular (kimlik_no, sefer_id, ad, soyad, telefon_numarasi, email)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissss", $kimlik_no, $sefer_id, $ad, $soyad, $telefon, $email);
    
    if ($stmt->execute()) {
        echo "Yolcu başarıyla eklendi. <a href='passengers.php'>Listeye dön</a>";
    } else {
        echo "Hata: " . $stmt->error;
    }

    $stmt->close();
}
?>

<h2>Yeni Yolcu Ekle</h2>
<form method="POST">
    Kimlik No: <input type="text" name="kimlik_no" required><br>
    Sefer ID: <input type="number" name="sefer_id" required><br>
    Ad: <input type="text" name="ad" required><br>
    Soyad: <input type="text" name="soyad" required><br>
    Telefon: <input type="text" name="telefon" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Ekle</button>
</form>
