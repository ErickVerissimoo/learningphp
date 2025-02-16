<?php

namespace Src\Model;

use function Src\Model\plus;
require 'func.php';
require __DIR__ ."/../../vendor/autoload.php";
class Carro
{
    
    private Type $type;
    
public function __toString(): string{
    
return "o carro é do tipo {$this-> type -> getValue()}";
}
}
global $p;

function teste(): void{

}

$carro = new Carro;
$carro -> $type = Type::grande;

echo $carro;
define ("paraibano","sim");
$p= get_defined_constants(false);

$paraiba = $p['paraibano'];
echo $paraiba;

