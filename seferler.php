<?php
require 'db.php';

$sql = "SELECT Sefer.id, Sefer.tarih, Sefer.saat, 
               s1.ad AS kalkis, s2.ad AS varis,
               Sofor.ad_soyad AS sofor, Arac.plaka AS arac
        FROM Sefer
        JOIN Hat ON Sefer.hat_id = Hat.id
        JOIN Sube s1 ON Hat.kalkis_sube_id = s1.id
        JOIN Sube s2 ON Hat.varis_sube_id = s2.id
        JOIN Sofor ON Sefer.sofor_id = Sofor.id
        JOIN Arac ON Sefer.arac_id = Arac.id
        ORDER BY Sefer.tarih, Sefer.saat";

$result = $conn->query($sql);
?>

<h2>Mevcut Seferler</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tarih</th>
        <th>Saat</th>
        <th>Kalkış</th>
        <th>Varış</th>
        <th>Şoför</th>
        <th>Araç</th>
        <th>Seç</th>
    </tr>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['tarih']}</td>
                <td>{$row['saat']}</td>
                <td>{$row['kalkis']}</td>
                <td>{$row['varis']}</td>
                <td>{$row['sofor']}</td>
                <td>{$row['arac']}</td>
                <td><a href='add_ticket.php?sefer_id={$row['id']}'>Bilet Al</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>Hiç sefer bulunamadı.</td></tr>";
}
?>
</table>
