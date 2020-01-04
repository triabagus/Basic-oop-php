<?php

class Produk{

    public  $judul,
            $penulis,
            $penerbit,
            $harga; //property

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        
        $this->judul    = $judul;
        $this->penulis  = $penulis;
        $this->penerbit = $penerbit;
        $this->harga    = $harga;

    } // constructor

    public function getLabel()
    {
        return "$this->penulis , $this->penerbit";
    } 

}

class CetakInfoProduk {

    public function cetak(Produk $produk) // object type : hanya instance class Produk
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }

}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000); // object
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000); // object

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);
// echo $infoProduk1->cetak("string"); // error , harus instance class Produk
