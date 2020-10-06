<?php

// Jualan Produk
// Komik
// Game

class Produk{ // class

    public  $judul      = 'judul',
            $penulis    = 'penulis',
            $penerbit   = 'penerbit',
            $harga      = 0; // property , nilai default

    public function sayHello()
    {
        return "Hello world";
    } // method

    public function getLabel()
    {
        return "$this->penulis , $this->penerbit";
    } // method 

}

// $produk1 = new Produk(); // object
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2 = new Produk(); // object
// $produk2->judul = "Uncharted";
// $produk2->tambahProperty = "Tambah property";
// var_dump($produk2);

$produk3 = new Produk(); // object
$produk3->judul     = "Naruto";
$produk3->penulis   = "Masashi Kishimoto";
$produk3->penerbit  = "Shonen Jump";
$produk3->harga     = 30000;

$produk4 = new Produk(); // object
$produk4->judul     = "Uncharted";
$produk4->penulis   = "Neil Druckmann";
$produk4->penerbit  = "Sony Computer";
$produk4->harga     = 250000;

// echo "Komik : $produk3->penulis, $produk3->penerbit";
// echo "<br>";
// echo $produk3->sayHello();
// echo "<br>";
// echo $produk3->getLabel();

echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
