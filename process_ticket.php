<?php
require 'db.php';


$stmt = $pdo->prepare("INSERT INTO Yolcular (kimlik_no, sefer_id, ad, soyad, telefon_numarasi, email) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $_POST['kimlik_no'],
    $_POST['sefer_id'],
    $_POST['ad'],
    $_POST['soyad'],
    $_POST['telefon'],
    $_POST['email']
]);
$musteri_id = $pdo->lastInsertId();


$temsilci_id = rand(1, 5); 
$fiyat = rand(100, 500); 

$stmt = $pdo->prepare("INSERT INTO Odemeler (musteri_id, temsilci_id, fiyat, odeme_tarihi) VALUES (?, ?, ?, NOW())");
$stmt->execute([$musteri_id, $temsilci_id, $fiyat]);
$odeme_id = $pdo->lastInsertId();


$stmt = $pdo->prepare("INSERT INTO Biletler (musteri_id, temsilci_id, sefer_id, satis_yontemi, odeme_yontemi) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$musteri_id, $temsilci_id, $_POST['sefer_id'], 'Online', $_POST['odeme_yontemi']]);


if ($_POST['odeme_yontemi'] == 'Kredi Kartı') {
    $pdo->prepare("INSERT INTO Kredi_Karti (odeme_id, kart_tipi, kart_no, cvc, son_kullanma_tarihi, banka_adi, kart_uzerindeki_isim, site_id)
                   VALUES (?, 'Visa', '1111222233334444', 123, CURDATE(), 'Banka', 'Ad Soyad', 1)")
        ->execute([$odeme_id]);
} else {
    $pdo->prepare("INSERT INTO Nakit (odeme_id, sube_id, odemeyi_alan_kisi, para_ustu)
                   VALUES (?, 1, 'Feyza Gülen', 0.00)")
        ->execute([$odeme_id]);
}

echo "Bilet başarıyla satın alındı!";
?>
