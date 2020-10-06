<?php

class Produk{

    public  $judul,
            $penulis,
            $penerbit,
            $harga; //property

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        
        $this->judul        = $judul;
        $this->penulis      = $penulis;
        $this->penerbit     = $penerbit;
        $this->harga        = $harga;

    } // constructor

    public function getLabel()
    {
        return "$this->penulis , $this->penerbit";
    } 

    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;

    }

}

class Komik extends Produk{

    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {

        parent::__construct($judul, $penulis, $penerbit, $harga); // overriding

        $this->jmlHalaman = $jmlHalaman;

    }

    public function getInfoProduk()
    {
        $str = "Komik : ". parent::getInfoProduk() ." - {$this->jmlHalaman} Halaman.";
        // overriding
        return $str;

    }

}

class Game extends Produk{

    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {

        parent::__construct($judul, $penulis, $penerbit, $harga); // overriding

        $this->waktuMain = $waktuMain;
    
    }

    public function getInfoProduk()
    {
        $str = "Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        // overriding
        return $str;

    }

}

class CetakInfoProduk {

    public function cetak(Produk $produk) // object type : hanya instance class Produk
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }

}

// object
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50); 


echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

// Komik : Naruto | Masashi Kishimoto , Shonen Jump (Rp. 30000) - 100 Halaman.
// Game  : Uncharted | Neil Druckmann , Sony Computer (Rp. 250000) ~ 50 Jam.