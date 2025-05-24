<?php
// db.php dosyasını PDO ile veritabanı bağlantısı için ekliyoruz
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen veriler
    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kart_no = $_POST['kart_no'];
    $cvc = $_POST['cvc'];
    $son_kullanma = $_POST['son_kullanma'];

    try {
        // Yolcu var mı kontrol et
        $sql_yolcu = "SELECT musteri_id FROM Yolcular WHERE kimlik_no = :tc";
        $stmt = $conn->prepare($sql_yolcu);
        $stmt->execute(['tc' => $tc]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            // Yolcu yoksa ekle
            $sql_ekle = "INSERT INTO Yolcular (kimlik_no, ad, soyad, telefon_numarasi, email, password) 
                         VALUES (:tc, :ad, :soyad, '', '', '')";
            $stmt2 = $conn->prepare($sql_ekle);
            $stmt2->execute(['tc' => $tc, 'ad' => $ad, 'soyad' => $soyad]);
            $musteri_id = $conn->lastInsertId();
        } else {
            // Yolcu varsa id al
            $musteri_id = $row['musteri_id'];
        }

        // Temsilci, sefer, fiyat bilgisi (örnek)
        $temsilci_id = 1;
        $sefer_id = 1;
        $fiyat = 100.00;

        // Ödeme ekle
        $odeme_tarihi = date("Y-m-d");
        $sql_odeme = "INSERT INTO Odemeler (musteri_id, temsilci_id, fiyat, odeme_tarihi) 
                      VALUES (:musteri_id, :temsilci_id, :fiyat, :odeme_tarihi)";
        $stmt3 = $conn->prepare($sql_odeme);
        $stmt3->execute([
            'musteri_id' => $musteri_id,
            'temsilci_id' => $temsilci_id,
            'fiyat' => $fiyat,
            'odeme_tarihi' => $odeme_tarihi
        ]);
        $odeme_id = $conn->lastInsertId();

        // Kredi kartı bilgisi ekle
        $site_id = 1;
        $kart_tipi = "Visa"; // Sabit örnek
        $sql_kart = "INSERT INTO Kredi_Karti (odeme_id, kart_tipi, kart_no, cvc, son_kullanma_tarihi, banka_adi, kart_uzerindeki_isim, site_id)
                     VALUES (:odeme_id, :kart_tipi, :kart_no, :cvc, :son_kullanma, '', :kart_uzerindeki_isim, :site_id)";
        $stmt4 = $conn->prepare($sql_kart);
        $stmt4->execute([
            'odeme_id' => $odeme_id,
            'kart_tipi' => $kart_tipi,
            'kart_no' => $kart_no,
            'cvc' => $cvc,
            'son_kullanma' => $son_kullanma,
            'kart_uzerindeki_isim' => $ad . ' ' . $soyad,
            'site_id' => $site_id
        ]);

        // Bilet ekle
        $satis_yontemi = "Online";
        $odeme_yontemi = "Kredi Kartı";
        $sql_bilet = "INSERT INTO Biletler (musteri_id, temsilci_id, sefer_id, satis_yontemi, odeme_yontemi)
                      VALUES (:musteri_id, :temsilci_id, :sefer_id, :satis_yontemi, :odeme_yontemi)";
        $stmt5 = $conn->prepare($sql_bilet);
        $stmt5->execute([
            'musteri_id' => $musteri_id,
            'temsilci_id' => $temsilci_id,
            'sefer_id' => $sefer_id,
            'satis_yontemi' => $satis_yontemi,
            'odeme_yontemi' => $odeme_yontemi
        ]);

        $message = "Biletiniz başarıyla alındı! Teşekkür ederiz.";

    } catch (PDOException $e) {
        $message = "Bir hata oluştu: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Bilet Alma Ekranı</title>
    <style>
        /* Genel gövde ayarları */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Başlık */
        h2 {
            margin-top: 40px;
            color: #333;
            text-align: center;
        }
        /* Formu içeren kutu */
        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }
        form {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 350px;
        }
        /* Label stili */
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }
        /* Input alanları */
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1.8px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        /* Focus durumunda input */
        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 6px rgba(0,123,255,0.3);
        }
        /* Buton stili */
        button {
            width: 100%;
            background: #007bff;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background: #0056b3;
        }
        /* Başarılı/hata mesajı */
        .message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 15px;
            border-radius: 6px;
            margin: 20px auto;
            font-weight: 600;
            text-align: center;
            width: 350px;
        }
    </style>
</head>
<body>
    <h2>Bilet Alma Formu</h2>
    <main>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php else: ?>
            <form method="POST" action="">
                <label>TC Kimlik No:</label>
                <input type="text" name="tc" required maxlength="11" pattern="\d{11}" title="11 haneli TC kimlik numarası">

                <label>Ad:</label>
                <input type="text" name="ad" required>

                <label>Soyad:</label>
                <input type="text" name="soyad" required>

                <label>Kart Numarası:</label>
                <input type="text" name="kart_no" required maxlength="16" pattern="\d{16}" title="16 haneli kart numarası">

                <label>CVC:</label>
                <input type="text" name="cvc" required maxlength="3" pattern="\d{3}" title="3 haneli CVC">

                <label>Son Kullanma Tarihi (YYYY-AA-GG):</label>
                <input type="date" name="son_kullanma" required>

                <button type="submit">Bilet Al</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>

