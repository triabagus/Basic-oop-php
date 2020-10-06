<?php

// class contohStatic{
//     public static $angka = 1;

//     public static function hallo()
//     {
//         return "Hallo ". self::$angka++ . " kali";
//     }

// }

// //tanpa intance objek
// // $obj = new contohStatic;
// echo contohStatic::$angka;
// echo "<hr>";
// echo contohStatic::hallo();
// echo "<br>";
// echo contohStatic::hallo();

class Contoh {
    public static $angka = 1;
    // public $angka = 1;

    public function hallo()
    {
        return "Hallo ". self::$angka++ ." kali <br>";
    }

    // public function hallo()
    // {
    //     return "Hallo ". $this->angka++ ." kali <br>";
    // }
}

$obj = new Contoh();
echo $obj->hallo();
echo $obj->hallo();
echo $obj->hallo();
echo "<hr>";
$obj2 = new Contoh();
echo $obj2->hallo();
echo $obj2->hallo();
echo $obj2->hallo();
