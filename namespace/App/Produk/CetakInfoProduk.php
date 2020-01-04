<?php

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