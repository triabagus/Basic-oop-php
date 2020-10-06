<?php

class Produk{

    private  $judul,
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        
        $this->judul        = $judul;
        $this->penulis      = $penulis;
        $this->penerbit     = $penerbit;
        $this->harga        = $harga;

    }

    //SETTER DAN GETTER
    public function setJudul($judul)
    {
        // if( !is_string($judul)){
        //     throw new Exception("Judul harus string");
        // }
        
        $this->judul = $judul;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit()
    {
        return $this->penerbit;
    }
    
    public function getLabel()
    {
        return "$this->penulis , $this->penerbit";
    } 
    
    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
        
    }
    
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga() // mengatasi visibility private
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function setDiskon( $diskon ) // diskon hanya di produk Game saja
    {
        $this->diskon = $diskon;
    }
    //END SETTER DAN GETTER
    
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
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50); 


echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";
$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";
$produk1->setJudul("Judul Baru");
echo $produk1->getJudul();