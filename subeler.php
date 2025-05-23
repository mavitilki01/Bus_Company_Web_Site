<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şubelerimiz - Otobüs Firması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5; /* Hafif gri arka plan */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 20px; /* Üstten biraz boşluk bırakır */
        }
        .branch-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin-bottom: 30px;
            overflow: hidden;
        }
        .branch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .branch-card .card-header {
            background-color: #0056b3; /* Koyu mavi başlık */
            color: white;
            font-weight: 600;
            border-bottom: none;
            padding: 1rem 1.25rem;
            font-size: 1.25rem; /* Şube isimlerinin daha belirgin olması için */
        }
        .branch-card .card-body {
            padding: 1.5rem;
        }
        .branch-card .card-body p {
            margin-bottom: 0.75rem;
            color: #555;
            font-size: 0.95rem;
        }
        .branch-card .card-body strong {
            color: #333;
        }
        .footer {
            background-color: #343a40; /* Koyu gri footer */
            color: white;
            padding: 30px 0;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div style="color:rgb(0,0,0);">
        <?php include('header.php'); ?> 
    </div>
    <section class="container my-5">
        <div class="row">
            <?php
            // Şube bilgileri bir dizi içinde saklanır.
            $subeler = [
                [
                    "ad" => "İstanbul Avrupa Yakası Şubesi",
                    "adres" => "Büyükdere Caddesi No:123, Levent, İstanbul",
                    "telefon" => "+90 212 123 45 67",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 18:00, Cumartesi: 10:00 - 16:00"
                ],
                [
                    "ad" => "İstanbul Anadolu Yakası Şubesi",
                    "adres" => "Bağdat Caddesi No:456, Kadıköy, İstanbul",
                    "telefon" => "+90 216 789 01 23",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 18:00, Cumartesi: 10:00 - 16:00"
                ],
                [
                    "ad" => "Ankara Kızılay Şubesi",
                    "adres" => "Atatürk Bulvarı No:789, Kızılay, Çankaya, Ankara",
                    "telefon" => "+90 312 234 56 78",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 17:30, Cumartesi: Kapalı"
                ],
                [
                    "ad" => "İzmir Konak Şubesi",
                    "adres" => "Cumhuriyet Meydanı No:10, Konak, İzmir",
                    "telefon" => "+90 232 345 67 89",
                    "calisma_saatleri" => "Hafta içi: 08:30 - 18:00"
                ],
                [
                    "ad" => "Antalya Merkez Şubesi",
                    "adres" => "Güllük Caddesi No:50, Muratpaşa, Antalya",
                    "telefon" => "+90 242 456 78 90",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 17:00"
                ],
                [
                    "ad" => "Adana Seyhan Şubesi",
                    "adres" => "Ziyapaşa Bulvarı No:100, Seyhan, Adana",
                    "telefon" => "+90 322 111 22 33",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 17:00"
                ],
                [
                    "ad" => "Bursa Osmangazi Şubesi",
                    "adres" => "Fevzi Çakmak Caddesi No:50, Osmangazi, Bursa",
                    "telefon" => "+90 224 444 55 66",
                    "calisma_saatleri" => "Hafta içi: 08:30 - 17:30"
                ],
                [
                    "ad" => "Gaziantep Şahinbey Şubesi",
                    "adres" => "Atatürk Bulvarı No:75, Şahinbey, Gaziantep",
                    "telefon" => "+90 342 555 66 77",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 17:00"
                ],
                [
                    "ad" => "Konya Selçuklu Şubesi",
                    "adres" => "Yeni İstanbul Caddesi No:200, Selçuklu, Konya",
                    "telefon" => "+90 332 777 88 99",
                    "calisma_saatleri" => "Hafta içi: 09:00 - 17:00"
                ]
            ];

            // Her bir şube için döngü oluşturulur ve bilgiler ekrana yazdırılır.
            foreach ($subeler as $sube) {
                echo '<div class="col-md-6 col-lg-4">'; // Her şube için sütun tanımlaması (duyarlı tasarım)
                echo '    <div class="card branch-card">';
                echo '        <div class="card-header">';
                echo '            ' . htmlspecialchars($sube["ad"]); // ŞUBE ADI BURADA GÖSTERİLİYOR
                echo '        </div>';
                echo '        <div class="card-body">';
                echo '            <p><strong>Adres:</strong> ' . htmlspecialchars($sube["adres"]) . '</p>';
                echo '            <p><strong>Telefon:</strong> <a href="tel:' . htmlspecialchars(str_replace(' ', '', $sube["telefon"])) . '">' . htmlspecialchars($sube["telefon"]) . '</a></p>';
                echo '            <p><strong>Çalışma Saatleri:</strong> ' . htmlspecialchars($sube["calisma_saatleri"]) . '</p>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Otobüs Firması. Tüm Hakları Saklıdır.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>