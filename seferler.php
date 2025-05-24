<?php
require 'db.php';

$sql = "SELECT Seferler.sefer_id, Seferler.hareket_tarihi, Seferler.hareket_saati,
               Hatlar.baslangic_noktasi, Hatlar.bitis_noktasi,
               Araclar.plaka, Soforler.ad AS sofor_ad, Soforler.soyad AS sofor_soyad
        FROM Seferler
        JOIN Hatlar ON Seferler.hat_id = Hatlar.hat_id
        JOIN Araclar ON Seferler.arac_id = Araclar.arac_id
        JOIN Soforler ON Seferler.sofor_id = Soforler.sofor_id";

$stmt = $conn->query($sql);
$seferler = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sefer Listesi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            text-align: center;
            padding: 12px 15px;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #dcdde1;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #27ae60;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        a:hover {
            background-color: #2ecc71;
        }

        td[colspan='8'] {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>

<h2>Mevcut Seferler</h2>

<table>
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
    if (count($seferler) > 0) {
        foreach ($seferler as $row) {
            echo "<tr>
                    <td>{$row['sefer_id']}</td>
                    <td>{$row['hareket_tarihi']}</td>
                    <td>{$row['hareket_saati']}</td>
                    <td>{$row['baslangic_noktasi']}</td>
                    <td>{$row['bitis_noktasi']}</td>
                    <td>{$row['sofor_ad']} {$row['sofor_soyad']}</td>
                    <td>{$row['plaka']}</td>
                    <td><a href='add_ticket.php?sefer_id={$row['sefer_id']}'>Bilet Al</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Hiç sefer bulunamadı.</td></tr>";
    }
    ?>
</table>

</body>
</html>
