<?php

abstract class Produk{

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

    public function setJudul($judul)
    {        
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

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function setDiskon( $diskon )
    {
        $this->diskon = $diskon;
    }

    abstract public function getInfoProduk();

    public function getInfo()
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
        $str = "Komik : ". parent::getInfo() ." - {$this->jmlHalaman} Halaman.";
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
        $str = "Game : ". parent::getInfo() ." ~ {$this->waktuMain} Jam.";
        // overriding
        return $str;

    }

}

class CetakInfoProduk {

    public $daftarProduk = array(); // [] version baru

    public function tambahProduk(Produk $produk) // object type : hanya instance class Produk
    {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() 
    {
        $str = "Daftar Produk : <br>";

        foreach ($this->daftarProduk as $p) {
            
            $str .= "- {$p->getInfoProduk()}<br>";
        }

        return $str;
    }

}

// error , karena abstract class tidak bisa di instance
// $produk = new Produk();


// object
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50); 

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();