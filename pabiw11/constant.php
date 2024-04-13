<?php

define('NAMA', 'Enjelita');
echo NAMA;

echo "<br>";

const UMUR = 18;
echo UMUR;

class Coba {
    const NAMA = 'Lely';
}

echo Coba::NAMA;


// Magic Constant
echo __LINE__;


function Coba() {
    return __FUNCTION__;
}

echo coba();

class Coba {
    public $kelas = __CLASS__;
}

$obj = new Coba;
echo $obj->kelas;