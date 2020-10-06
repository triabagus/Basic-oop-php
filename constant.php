<?php

define("NAMA", "TRIA BAGUS");
echo NAMA;
//define tidak bisa di simpan pada class

echo "<hr>";

const UMUR = 21;
echo UMUR;
//const bisa di simpan pada class

echo "<br>";
class Coba{
    const Usia = 21;
}

echo Coba::Usia;

//Beberapa Magic Constant
// __LINE__
// __FILE__
// __DIR__
// __FUNCTION__
// __CLASS__
// __TRAIT__
// __METHOD__
// __NAMESPACE__
