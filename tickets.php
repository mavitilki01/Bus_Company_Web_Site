<?php
require 'db.php';

$sql = "SELECT b.bilet_id, y.ad, y.soyad, s.hareket_tarihi, s.hareket_saati, b.satis_yontemi, b.odeme_yontemi
        FROM Biletler b
        JOIN Yolcular y ON b.musteri_id = y.musteri_id
        JOIN Seferler s ON b.sefer_id = s.sefer_id";
$result = $conn->query($sql);
?>

<h2>Bilet Listesi</h2>
<table border="1">
    <tr>
        <th>Bilet ID</th>
        <th>Yolcu Adı</th>
        <th>Hareket Tarihi</th>
        <th>Hareket Saati</th>
        <th>Satış Yöntemi</th>
        <th>Ödeme Yöntemi</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row["bilet_id"] ?></td>
            <td><?= $row["ad"] . " " . $row["soyad"] ?></td>
            <td><?= $row["hareket_tarihi"] ?></td>
            <td><?= $row["hareket_saati"] ?></td>
            <td><?= $row["satis_yontemi"] ?></td>
            <td><?= $row["odeme_yontemi"] ?></td>
        </tr>
    <?php } ?>
</table>
