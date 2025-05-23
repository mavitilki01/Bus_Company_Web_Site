<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $musteri_id = $_POST["musteri_id"];
    $sefer_id = $_POST["sefer_id"];
    $satis_yontemi = $_POST["satis_yontemi"];
    $odeme_yontemi = $_POST["odeme_yontemi"];

    // 1. Bilet kaydını ekle
    $sql_bilet = "INSERT INTO Biletler (musteri_id, sefer_id, satis_yontemi, odeme_yontemi) VALUES (?, ?, ?, ?)";
    $stmt_bilet = $conn->prepare($sql_bilet);
    $stmt_bilet->bind_param("iiss", $musteri_id, $sefer_id, $satis_yontemi, $odeme_yontemi);

    if ($stmt_bilet->execute()) {
        $bilet_id = $stmt_bilet->insert_id;

        // 2. Ödeme bilgilerini ekle
        if ($odeme_yontemi == "kredi_karti") {
            $kart_no = $_POST["kart_no"];
            $son_kullanma = $_POST["son_kullanma"];
            $cvv = $_POST["cvv"];

            $sql_kredi = "INSERT INTO Kredi_Karti (bilet_id, kart_no, son_kullanma_tarihi, cvv) VALUES (?, ?, ?, ?)";
            $stmt_kredi = $conn->prepare($sql_kredi);
            $stmt_kredi->bind_param("isss", $bilet_id, $kart_no, $son_kullanma, $cvv);
            $stmt_kredi->execute();
        } elseif ($odeme_yontemi == "nakit") {
            $verilen = $_POST["verilen"];
            $para_ustu = $_POST["para_ustu"];

            $sql_nakit = "INSERT INTO Nakit (bilet_id, verilen_tutar, para_ustu) VALUES (?, ?, ?)";
            $stmt_nakit = $conn->prepare($sql_nakit);
            $stmt_nakit->bind_param("idd", $bilet_id, $verilen, $para_ustu);
            $stmt_nakit->execute();
        }

        echo "Bilet başarıyla oluşturuldu. <a href='tickets.php'>Bilet Listesi</a>";
    } else {
        echo "Hata: " . $stmt_bilet->error;
    }
}
?>

<h2>Bilet Satın Al</h2>
<form action="odeme.php" method="POST">
    Müşteri ID: <input type="number" name="musteri_id" required><br>
    Sefer ID: <input type="number" name="sefer_id" required><br>
    Satış Yöntemi: 
    <select name="satis_yontemi">
        <option value="internet">İnternet</option>
        <option value="sube">Şube</option>
    </select><br>
    Ödeme Yöntemi:
    <select name="odeme_yontemi" id="odeme_yontemi" onchange="toggleOdeme()">
        <option value="kredi_karti">Kredi Kartı</option>
        <option value="nakit">Nakit</option>
    </select><br>

    <div id="kredi_karti_fields" style="display:none;">
        Kart No: <input type="text" name="kart_no"><br>
        Son Kullanma Tarihi: <input type="text" name="son_kullanma"><br>
        CVV: <input type="text" name="cvv"><br>
    </div>

    <div id="nakit_fields" style="display:none;">
        Verilen Tutar: <input type="number" step="0.01" name="verilen"><br>
        Para Üstü: <input type="number" step="0.01" name="para_ustu"><br>
    </div>

    <button type="submit">Satın Al</button>
</form>

<script>
function toggleOdeme() {
    const odemeYontemi = document.getElementById("odeme_yontemi").value;
    document.getElementById("kredi_karti_fields").style.display = odemeYontemi === "kredi_karti" ? "block" : "none";
    document.getElementById("nakit_fields").style.display = odemeYontemi === "nakit" ? "block" : "none";
}
</script>
