<?php
session_start();     // Oturumu başlat
session_unset();     // Tüm oturum değişkenlerini kaldır
session_destroy();   // Oturumu tamamen yok et
header('Location: main.php'); // Ana sayfaya yönlendir
exit;
?>