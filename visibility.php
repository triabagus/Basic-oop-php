<?php

/**Penjelasan Visibility atau Access Modifier
 * 
 * visibility ada 3 :
    - public    = bisa di gunakan dimana saja baik dalam class atau child class(class turunan) atau diluar class itu sendiri.
    - protected = bisa di akses dalam class dan class turunannya saja.
    - private   = hanya bisa di akses di class itu sendiri.
**/    

class Produk{

    public  $judul,
            $penulis,
            $penerbit;

    protected $diskon = 0;

    // protected $harga; //property dengan visibility
    private $harga;

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

    public function getHarga() // mengatasi visibility private
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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

    // public function getHarga() // mengatasi visibility protected
    // {
    //     return $this->harga;
    // }

    public function getInfoProduk()
    {
        $str = "Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        // overriding
        return $str;

    }

    public function setDiskon( $diskon ) // diskon hanya di produk Game saja
    {
        $this->diskon = $diskon;
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
echo "<hr>";

// $produk2->harga = 5000;
// echo $produk2->harga; //problem access modifier / visibility 

// $produk2->diskon = 90; // problem access modifier / visibilitys

$produk2->setDiskon(50);
echo $produk2->getHarga();

// Komik : Naruto | Masashi Kishimoto , Shonen Jump (Rp. 30000) - 100 Halaman.
// Game  : Uncharted | Neil Druckmann , Sony Computer (Rp. 250000) ~ 50 Jam.