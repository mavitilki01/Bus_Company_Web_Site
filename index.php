<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KARTUR Bilet Sorgulama</title>
</head>
<body>
    <h1>Sefer Sorgulama</h1>
    <form method="GET" action="buy_ticket.php">
        <label>Başlangıç Noktası:</label>
        <input type="text" name="baslangic" required><br>
        <label>Bitiş Noktası:</label>
        <input type="text" name="bitis" required><br>
        <label>Tarih:</label>
        <input type="date" name="tarih" required><br>
        <button type="submit">Sefer Ara</button>
    </form>
</body>
</html>
