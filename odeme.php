<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sefer_id = $_POST['sefer_id'];
    $yolcu_adi = $_POST['yolcu_adi'];
    $tc_kimlik = $_POST['tc_kimlik'];
    $odeme_tipi = $_POST['odeme_tipi'];
    $tutar = 300; // örnek sabit ücret

    // 1. Yolcu kaydı
    $stmt = $conn->prepare("INSERT INTO Yolcu (ad_soyad, tc_kimlik) VALUES (?, ?)");
    $stmt->bind_param("ss", $yolcu_adi, $tc_kimlik);
    $stmt->execute();
    $yolcu_id = $stmt->insert_id;
    $stmt->close();

    // 2. Ödeme kaydı
    $stmt = $conn->prepare("INSERT INTO Odeme (tutar, odeme_tipi) VALUES (?, ?)");
    $stmt->bind_param("ds", $tutar, $odeme_tipi);
    $stmt->execute();
    $odeme_id = $stmt->insert_id;
    $stmt->close();

    // 3. Bilet kaydı
    $stmt = $conn->prepare("INSERT INTO Bilet (sefer_id, yolcu_id, odeme_id) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $sefer_id, $yolcu_id, $odeme_id);
    $stmt->execute();
    $stmt->close();

    echo "<h2>Ödeme Başarılı</h2>";
    echo "<p>Bilet kaydı başarıyla tamamlandı!</p>";
    echo "<a href='index.php'>Ana Sayfaya Dön</a>";
} else {
    echo "<p>Hatalı istek.</p>";
}
?>
