<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lüks Araçlarımız</title>
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    .vehicle-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr); /* 4 sütun */
      gap: 20px;
      margin-top: 30px;
    }
    .vehicle {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .vehicle h2 {
      color: #007bff;
      margin: 10px 0;
    }
    .vehicle p {
      color: #555;
    }
    .vehicle img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      max-height: 200px;
      object-fit: cover;
    }

    /* Responsive: ekran küçüldükçe sütun sayısını azalt */
    @media (max-width: 1200px) {
      .vehicle-container {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    @media (max-width: 900px) {
      .vehicle-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }
    @media (max-width: 600px) {
      .vehicle-container {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <div style="color:rgb(0,0,0);">
    <?php include('header.php'); ?>
  </div>

  <h1>Lüks Araçlarımız</h1>

  <div class="vehicle-container">
    <div class="vehicle">
      <img src="Resimler/neoplan.jpg" alt="Neoplan Cityliner" />
      <h2>Neoplan Cityliner</h2>
      <p>Modern tasarımı ve konforlu yapısı ile şehirlerarası yolculuklarda üstün performans sunar. Geniş iç hacmi ve donanımı ile VIP taşımacılık için idealdir.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/man.jpg" alt="MAN Lion's Coach" />
      <h2>MAN Lion's Coach</h2>
      <p>Yakıt verimliliği ve güvenlik donanımlarıyla öne çıkan MAN Lion's Coach, uzun yolculuklarda yüksek konfor ve güvenlik sağlar.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/tourısmo.jpg" alt="Mercedes Tourismo" />
      <h2>Mercedes Tourismo</h2>
      <p>Mercedes kalitesiyle donatılmış bu otobüs, sessiz sürüşü ve ergonomik koltukları ile yolculara benzersiz bir seyahat deneyimi sunar.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/travego.jpg" alt="Mercedes Travego" />
      <h2>Mercedes Travego</h2>
      <p>Yolcu taşımacılığında lüksün sembolü olan Travego, en yeni teknolojilerle donatılmıştır ve yüksek yolcu kapasitesi sunar.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/neoplan.skyliner.jpg" alt="Neoplan Skyliner" />
      <h2>Neoplan Skyliner</h2>
      <p>İki katlı yapısı ile kalabalık gruplar için mükemmel bir seçimdir. Yüksek konfor ve etkileyici panoramik camlarıyla yolculuk keyfi sunar.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/setra.jpg" alt="Setra" />
      <h2>Setra</h2>
      <p>Setra, premium yolcu otobüslerinde konfor, kalite ve güvenliği bir arada sunan özel bir markadır. Sessiz sürüş ve şık tasarımıyla öne çıkar.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/volvo.jpg" alt="Volvo 9900" />
      <h2>Volvo 9900</h2>
      <p>Volvo’nun ileri teknoloji ürünü olan 9900 modeli, aerodinamik yapısı ve sürüş destek sistemleriyle modern taşımacılığın simgesidir.</p>
    </div>

    <div class="vehicle">
      <img src="Resimler/safir.jpg" alt="Temsa Safir" />
      <h2>Temsa Safir</h2>
      <p>Yerli üretim Temsa Safir, ekonomik ve konforlu yapısı ile şehirlerarası ve turistik taşımacılıkta tercih edilmektedir.</p>
    </div>
  </div>

</body>
</html>
