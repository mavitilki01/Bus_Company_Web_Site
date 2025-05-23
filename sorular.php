<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sıkça Sorulan Sorular - Otobüs Firması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }
        .faq-section {
            padding: 30px 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .faq-title {
            color: #007bff;
            font-weight: 700;
            margin-bottom: 30px; 
        }
        .accordion-button {
            font-weight: 600;
            color: #0056b3;
            font-size: 1.7rem;
        }
        .accordion-button:not(.collapsed) {
            color: #0056b3;
            background-color: #e7f1ff;
            box-shadow: inset 0 0px 0 rgba(0, 0, 0, .125);
        }
        .accordion-body {
            color: #555;
            line-height: 1.6;
            font-weight: bold;
        }
        .footer {
            background-color: #343a40;
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

    <div class="container my-3"> 
        <div class="row justify-content-center"> 
            <div class="col-lg-8 col-md-10"> 
                <div class="faq-section"> 
                    <h1 class="text-center faq-title">Sıkça Sorulan Sorular</h1>

                    <div class="accordion" id="faqAccordion">



                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaj hakkı ve ek bagaj ücretleri nelerdir?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Her yolcunun 30 kg'a kadar ücretsiz bagaj hakkı bulunmaktadır. Fazla bagajlarınız için otobüse biniş esnasında ek ücretlendirme yapılmaktadır. Detaylı bilgi için lütfen şubelerimizle iletişime geçin.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Biletimi nasıl değiştirebilirim veya iptal edebilirim?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Bilet değişiklik ve iptal işlemlerinizi sefer saatinden en geç 6 saat öncesine kadar web sitemiz veya mobil uygulamamız üzerinden yapabilirsiniz. Şubelerimizden alınan biletler için şubelerimizle iletişime geçmeniz gerekmektedir.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Evcil hayvan ile seyahat edebilir miyim?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Maalesef, evcil hayvanların otobüs içerisinde seyahat etmelerine izin verilmemektedir. Ancak, özel durumlar için müşteri hizmetlerimizle iletişime geçerek bilgi alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Otobüs içi hizmetleriniz nelerdir?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Otobüslerimizde ücretsiz Wi-Fi, koltuk arkası ekranlarda film/müzik keyfi, USB şarj portları ve ikram servislerimiz bulunmaktadır. Konforlu bir yolculuk için tüm detaylar düşünülmüştür.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Online bilet alırken sorun yaşıyorum, ne yapmalıyım?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Online bilet alımında teknik bir sorun yaşıyorsanız, lütfen tarayıcı önbelleğinizi temizlemeyi deneyin. Sorun devam ederse, müşteri hizmetlerimizle iletişime geçerek destek alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Kalkış saatinden ne kadar önce terminalde olmalıyım?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Otobüsünüzün kalkış saatinden en az 30 dakika önce terminalde veya belirlenen kalkış noktasında bulunmanız önerilir.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Kayıp eşya durumunda ne yapmalıyım?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kayıp eşya bildirimleriniz için en kısa sürede müşteri hizmetlerimizi aramanız veya en yakın şubemize başvurmanız gerekmektedir. Eşyanızın bulunması durumunda size geri dönüş yapılacaktır.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Öğrenci, engelli veya yaşlı indirimi var mı?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Belirli seferlerde ve koşullarda öğrenci, engelli ve 65 yaş üstü yolcularımıza özel indirimler sunulmaktadır. Bilet alımı sırasında veya şubelerimizden detaylı bilgi alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Otobüslerde priz veya şarj imkanı var mı?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Evet, otobüslerimizin çoğunda her koltukta USB şarj portları bulunmaktadır. Bazı otobüslerimizde ise priz imkanı da mevcuttur.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Otobüs Firması. Tüm Hakları Saklıdır.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>