<?php

require_once 'app/init.php';

//$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
//$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50);

//$cetakProduk = new CetakInfoProduk();
//$cetakProduk->tambahProduk( $produk1 );
//$cetakProduk->tambahProduk( $produk2);
//echo $cetakProduk->cetakInfo();

//echo "<hr>";

use app\Service\User as ServiceUser;
use app\produk\User as produkUser;

new ServiceUser();
echo "<br>";
new produkUser();