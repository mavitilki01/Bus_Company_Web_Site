<?php require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['baslangic'])) {
    $baslangic = $_GET['baslangic'];
    $bitis = $_GET['bitis'];
    $tarih = $_GET['tarih'];

    $stmt = $pdo->prepare("SELECT s.*, h.baslangic_noktasi, h.bitis_noktasi, a.plaka, so.ad AS sofor_ad, so.soyad AS sofor_soyad
                           FROM Seferler s
                           JOIN Hatlar h ON s.hat_id = h.hat_id
                           JOIN Araclar a ON s.arac_id = a.arac_id
                           JOIN Soforler so ON s.sofor_id = so.sofor_id
                           WHERE h.baslangic_noktasi = ? AND h.bitis_noktasi = ? AND s.hareket_tarihi = ?");
    $stmt->execute([$baslangic, $bitis, $tarih]);
    $seferler = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bilet Satın Al</title>
</head>
<body>
    <h1>Mevcut Seferler</h1>
    <?php if (!empty($seferler)): ?>
        <form method="POST" action="process_ticket.php">
            <label>Ad:</label><input name="ad" required><br>
            <label>Soyad:</label><input name="soyad" required><br>
            <label>Telefon:</label><input name="telefon" required><br>
            <label>Email:</label><input name="email"><br>
            <label>Kimlik No:</label><input name="kimlik_no" required><br>
            <label>Sefer Seçiniz:</label>
            <select name="sefer_id">
                <?php foreach ($seferler as $sefer): ?>
                    <option value="<?= $sefer['sefer_id'] ?>">
                        <?= $sefer['hareket_tarihi'] ?> <?= $sefer['hareket_saati'] ?> | <?= $sefer['plaka'] ?> | Şoför: <?= $sefer['sofor_ad'] ?> <?= $sefer['sofor_soyad'] ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Ödeme Yöntemi:</label>
            <select name="odeme_yontemi">
                <option value="Kredi Kartı">Kredi Kartı</option>
                <option value="Nakit">Nakit</option>
            </select><br>
            <button type="submit">Bilet Al</button>
        </form>
    <?php else: ?>
        <p>Uygun sefer bulunamadı.</p>
    <?php endif; ?>
</body>
</html>
