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

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000); // object
$produk2 = new Produk("Uncharted", "Neil Druckmann", "Sony Computer", 250000); // object
$produk3 = new Produk("Dragon Ball"); // object

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

var_dump($produk3);
