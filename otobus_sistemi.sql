-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2025, 14:33:10
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otobus_sistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

CREATE TABLE `araclar` (
  `arac_id` int(11) NOT NULL,
  `plaka` varchar(20) DEFAULT NULL,
  `kapasite` int(11) DEFAULT NULL,
  `arac_modeli` varchar(50) DEFAULT NULL,
  `koltuk_tipi` varchar(30) DEFAULT NULL,
  `multimedia` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`arac_id`, `plaka`, `kapasite`, `arac_modeli`, `koltuk_tipi`, `multimedia`) VALUES
(1, '06ABC123', 46, 'Mercedes', '2+1', 'Evet'),
(2, '70KRM999', 50, 'Temsa', '2+2', 'Hayir'),
(3, '01ADN59', 46, 'Man-Lions', '2+1', 'Evet'),
(4, '57SNP121', 76, 'Otokar', '2+2', 'Evet'),
(5, '38KYS38', 58, 'Mercedes-Travego', '2+1', 'Hayir');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletler`
--

CREATE TABLE `biletler` (
  `bilet_id` int(11) NOT NULL,
  `musteri_id` int(11) DEFAULT NULL,
  `temsilci_id` int(11) DEFAULT NULL,
  `sefer_id` int(11) DEFAULT NULL,
  `satis_yontemi` varchar(20) DEFAULT NULL,
  `odeme_yontemi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `biletler`
--

INSERT INTO `biletler` (`bilet_id`, `musteri_id`, `temsilci_id`, `sefer_id`, `satis_yontemi`, `odeme_yontemi`) VALUES
(1, 1, 1, 1, 'Online', 'Kredi Kartı'),
(2, 2, 2, 2, 'Şubeden', 'Kredi Kartı'),
(3, 3, 3, 3, 'Şubeden', 'Nakit'),
(4, 4, 4, 4, 'Şubeden', 'Nakit'),
(5, 5, 5, 5, 'Online', 'Kredi Kartı'),
(6, 6, 1, 1, 'Online', 'Kredi Kartı'),
(7, 6, 1, 1, 'Online', 'Kredi Kartı'),
(8, 6, 1, 1, 'Online', 'Kredi Kartı'),
(9, 6, 1, 1, 'Online', 'Kredi Kartı'),
(10, 6, 1, 1, 'Online', 'Kredi Kartı'),
(11, 6, 1, 1, 'Online', 'Kredi Kartı'),
(12, 6, 1, 1, 'Online', 'Kredi Kartı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hatlar`
--

CREATE TABLE `hatlar` (
  `hat_id` int(11) NOT NULL,
  `baslangic_noktasi` varchar(100) DEFAULT NULL,
  `bitis_noktasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hatlar`
--

INSERT INTO `hatlar` (`hat_id`, `baslangic_noktasi`, `bitis_noktasi`) VALUES
(1, 'Ankara', 'İstanbul'),
(2, 'Adana', 'Karaman'),
(3, 'Sinop', 'Kayseri'),
(4, 'Muğla', 'Antalya'),
(5, 'Sivas', 'Kilis');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `internet_sitesi`
--

CREATE TABLE `internet_sitesi` (
  `site_id` int(11) NOT NULL,
  `site_adresi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `internet_sitesi`
--

INSERT INTO `internet_sitesi` (`site_id`, `site_adresi`) VALUES
(1, 'www.otobusitesi.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kredi_karti`
--

CREATE TABLE `kredi_karti` (
  `odeme_id` int(11) NOT NULL,
  `kart_tipi` varchar(20) DEFAULT NULL,
  `kart_no` varchar(20) DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `son_kullanma_tarihi` date DEFAULT NULL,
  `banka_adi` varchar(50) DEFAULT NULL,
  `kart_uzerindeki_isim` varchar(100) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kredi_karti`
--

INSERT INTO `kredi_karti` (`odeme_id`, `kart_tipi`, `kart_no`, `cvc`, `son_kullanma_tarihi`, `banka_adi`, `kart_uzerindeki_isim`, `site_id`) VALUES
(1, 'Troy', '1234567890123456', 123, '2027-12-01', 'Yapıkredi', 'Mehmet Demir', 1),
(2, 'MasterCard', '4234567890123456', 456, '2026-12-01', 'İş Bankası', 'Elif Demir', 1),
(5, 'Visa', '7697888358010129', 678, '2026-12-01', 'Kuveyttürk', 'Burak Özlü', 1),
(6, 'Visa', '1234567891012342', 654, '2025-05-31', '', 'isilay özlü', 1),
(7, 'Visa', '1234567891012342', 654, '2025-05-18', '', 'isilay özlü', 1),
(8, 'Visa', '1234567891012342', 654, '2025-05-18', '', 'isilay özlü', 1),
(9, 'Visa', '1234567891012342', 643, '2025-05-18', '', 'isilay özlü', 1),
(10, 'Visa', '1234567891012342', 543, '2025-05-30', '', 'isilay özlü', 1),
(11, 'Visa', '1234567891012342', 434, '2025-05-24', '', 'isilay özlü', 1),
(12, 'Visa', '1234567891012342', 434, '2025-05-24', '', 'isilay özlü', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nakit`
--

CREATE TABLE `nakit` (
  `odeme_id` int(11) NOT NULL,
  `sube_id` int(11) DEFAULT NULL,
  `odemeyi_alan_kisi` varchar(100) DEFAULT NULL,
  `para_ustu` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `odeme_id` int(11) NOT NULL,
  `musteri_id` int(11) DEFAULT NULL,
  `temsilci_id` int(11) DEFAULT NULL,
  `fiyat` decimal(6,2) DEFAULT NULL,
  `odeme_tarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odemeler`
--

INSERT INTO `odemeler` (`odeme_id`, `musteri_id`, `temsilci_id`, `fiyat`, `odeme_tarihi`) VALUES
(1, 1, 1, 900.00, '2025-05-24'),
(2, 2, 2, 1900.00, '2025-05-24'),
(3, 3, 3, 350.00, '2025-05-24'),
(4, 4, 4, 760.00, '2025-05-24'),
(5, 5, 5, 450.00, '2025-05-24'),
(6, 6, 1, 100.00, '2025-05-24'),
(7, 6, 1, 100.00, '2025-05-24'),
(8, 6, 1, 100.00, '2025-05-24'),
(9, 6, 1, 100.00, '2025-05-24'),
(10, 6, 1, 100.00, '2025-05-24'),
(11, 6, 1, 100.00, '2025-05-24'),
(12, 6, 1, 100.00, '2025-05-24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_temsilcileri`
--

CREATE TABLE `satis_temsilcileri` (
  `temsilci_id` int(11) NOT NULL,
  `sube_id` int(11) DEFAULT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `satis_temsilcileri`
--

INSERT INTO `satis_temsilcileri` (`temsilci_id`, `sube_id`, `ad`, `soyad`, `telefon`) VALUES
(1, 1, 'Feyza', 'Gülen', '05001112233'),
(2, 2, 'Zeynep', 'Kaya', '05356453423'),
(3, 3, 'Nisa Rümeysa', 'Kocaman', '05450099600'),
(4, 4, 'Işılay', 'Özlü', '05378897634'),
(5, 5, 'Furkan', 'Mortaş', '05557694201');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seferler`
--

CREATE TABLE `seferler` (
  `sefer_id` int(11) NOT NULL,
  `hat_id` int(11) DEFAULT NULL,
  `arac_id` int(11) DEFAULT NULL,
  `sofor_id` int(11) DEFAULT NULL,
  `hareket_tarihi` date DEFAULT NULL,
  `hareket_saati` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `seferler`
--

INSERT INTO `seferler` (`sefer_id`, `hat_id`, `arac_id`, `sofor_id`, `hareket_tarihi`, `hareket_saati`) VALUES
(1, 3, 5, 1, '2025-05-10', '23:00'),
(2, 5, 3, 3, '2025-05-12', '09:45'),
(3, 1, 1, 4, '2025-05-13', '14:30'),
(4, 4, 2, 5, '2025-05-14', '18:00'),
(5, 2, 4, 2, '2025-05-15', '02:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soforler`
--

CREATE TABLE `soforler` (
  `sofor_id` int(11) NOT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `soforler`
--

INSERT INTO `soforler` (`sofor_id`, `ad`, `soyad`, `telefon`) VALUES
(1, 'Uğur', 'Kaya', '05321234567'),
(2, 'Mehmet', 'Mortaş', '05356789878'),
(3, 'Şaban', 'Şimşek', '05866184527'),
(4, 'Ramazan', 'Çiçek', '05334449812'),
(5, 'Habib', 'Civirci', '05053951575');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subeler`
--

CREATE TABLE `subeler` (
  `sube_id` int(11) NOT NULL,
  `sube_adi` varchar(100) DEFAULT NULL,
  `sehir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `subeler`
--

INSERT INTO `subeler` (`sube_id`, `sube_adi`, `sehir`) VALUES
(1, 'Ankara Şubesi', 'Ankara'),
(2, 'İstanbul Şubesi', 'İstanbul'),
(3, 'Adana Şubesi', 'Adana'),
(4, 'Sinop Şubesi', 'Sinop'),
(5, 'Karaman Şubesi', 'Karaman');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yolcular`
--

CREATE TABLE `yolcular` (
  `musteri_id` int(11) NOT NULL,
  `kimlik_no` varchar(20) DEFAULT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `telefon_numarasi` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yolcular`
--

INSERT INTO `yolcular` (`musteri_id`, `kimlik_no`, `ad`, `soyad`, `telefon_numarasi`, `email`, `password`) VALUES
(1, '12345678901', 'Mehmet', 'Demir', '05554443322', 'mehmet@gmail.com', '123456'),
(2, '12387236907', 'Elif', 'Demir', '05554443232', 'elif@gmail.com', '123456'),
(3, '98745677577', 'Burak', 'Çelik', '05874449763', 'burak@hotmail.com', '123456'),
(4, '78548901123', 'Ayşe', 'Arslan', '05554765422', 'ayse@hotmail.com', '123456'),
(5, '13627311779', 'Hüseyin', 'Kaptan', '05114239822', 'huseyin@gmail.com', '123456'),
(6, '42841913866', 'isilay', 'özlü', '', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `araclar`
--
ALTER TABLE `araclar`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`bilet_id`),
  ADD KEY `musteri_id` (`musteri_id`),
  ADD KEY `temsilci_id` (`temsilci_id`),
  ADD KEY `sefer_id` (`sefer_id`);

--
-- Tablo için indeksler `hatlar`
--
ALTER TABLE `hatlar`
  ADD PRIMARY KEY (`hat_id`);

--
-- Tablo için indeksler `internet_sitesi`
--
ALTER TABLE `internet_sitesi`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `kredi_karti`
--
ALTER TABLE `kredi_karti`
  ADD PRIMARY KEY (`odeme_id`),
  ADD KEY `site_id` (`site_id`);

--
-- Tablo için indeksler `nakit`
--
ALTER TABLE `nakit`
  ADD PRIMARY KEY (`odeme_id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`odeme_id`),
  ADD KEY `musteri_id` (`musteri_id`),
  ADD KEY `temsilci_id` (`temsilci_id`);

--
-- Tablo için indeksler `satis_temsilcileri`
--
ALTER TABLE `satis_temsilcileri`
  ADD PRIMARY KEY (`temsilci_id`),
  ADD KEY `sube_id` (`sube_id`);

--
-- Tablo için indeksler `seferler`
--
ALTER TABLE `seferler`
  ADD PRIMARY KEY (`sefer_id`),
  ADD KEY `hat_id` (`hat_id`),
  ADD KEY `arac_id` (`arac_id`),
  ADD KEY `sofor_id` (`sofor_id`);

--
-- Tablo için indeksler `soforler`
--
ALTER TABLE `soforler`
  ADD PRIMARY KEY (`sofor_id`);

--
-- Tablo için indeksler `subeler`
--
ALTER TABLE `subeler`
  ADD PRIMARY KEY (`sube_id`);

--
-- Tablo için indeksler `yolcular`
--
ALTER TABLE `yolcular`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `araclar`
--
ALTER TABLE `araclar`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `biletler`
--
ALTER TABLE `biletler`
  MODIFY `bilet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `hatlar`
--
ALTER TABLE `hatlar`
  MODIFY `hat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `internet_sitesi`
--
ALTER TABLE `internet_sitesi`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `odeme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `satis_temsilcileri`
--
ALTER TABLE `satis_temsilcileri`
  MODIFY `temsilci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `seferler`
--
ALTER TABLE `seferler`
  MODIFY `sefer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `soforler`
--
ALTER TABLE `soforler`
  MODIFY `sofor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `subeler`
--
ALTER TABLE `subeler`
  MODIFY `sube_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yolcular`
--
ALTER TABLE `yolcular`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `biletler`
--
ALTER TABLE `biletler`
  ADD CONSTRAINT `biletler_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `yolcular` (`musteri_id`),
  ADD CONSTRAINT `biletler_ibfk_2` FOREIGN KEY (`temsilci_id`) REFERENCES `satis_temsilcileri` (`temsilci_id`),
  ADD CONSTRAINT `biletler_ibfk_3` FOREIGN KEY (`sefer_id`) REFERENCES `seferler` (`sefer_id`);

--
-- Tablo kısıtlamaları `kredi_karti`
--
ALTER TABLE `kredi_karti`
  ADD CONSTRAINT `kredi_karti_ibfk_1` FOREIGN KEY (`odeme_id`) REFERENCES `odemeler` (`odeme_id`),
  ADD CONSTRAINT `kredi_karti_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `internet_sitesi` (`site_id`);

--
-- Tablo kısıtlamaları `nakit`
--
ALTER TABLE `nakit`
  ADD CONSTRAINT `nakit_ibfk_1` FOREIGN KEY (`odeme_id`) REFERENCES `odemeler` (`odeme_id`),
  ADD CONSTRAINT `nakit_ibfk_2` FOREIGN KEY (`sube_id`) REFERENCES `subeler` (`sube_id`);

--
-- Tablo kısıtlamaları `odemeler`
--
ALTER TABLE `odemeler`
  ADD CONSTRAINT `odemeler_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `yolcular` (`musteri_id`),
  ADD CONSTRAINT `odemeler_ibfk_2` FOREIGN KEY (`temsilci_id`) REFERENCES `satis_temsilcileri` (`temsilci_id`);

--
-- Tablo kısıtlamaları `satis_temsilcileri`
--
ALTER TABLE `satis_temsilcileri`
  ADD CONSTRAINT `satis_temsilcileri_ibfk_1` FOREIGN KEY (`sube_id`) REFERENCES `subeler` (`sube_id`);

--
-- Tablo kısıtlamaları `seferler`
--
ALTER TABLE `seferler`
  ADD CONSTRAINT `seferler_ibfk_1` FOREIGN KEY (`hat_id`) REFERENCES `hatlar` (`hat_id`),
  ADD CONSTRAINT `seferler_ibfk_2` FOREIGN KEY (`arac_id`) REFERENCES `araclar` (`arac_id`),
  ADD CONSTRAINT `seferler_ibfk_3` FOREIGN KEY (`sofor_id`) REFERENCES `soforler` (`sofor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
