<?php

namespace Src\Model;
use function Src\Model\plus;
require 'func.php';
require __DIR__ ."/../../vendor/autoload.php";
class Carro
{
    
    public Type $type;
public function __toString(): string{
    
return "o carro é do tipo {$this-> type -> getValue()}";
}
}
static $p =0;

$carro = new Carro;
$carro -> type = Type::grande;

echo $carro;
echo plus(x: 2, y: 3);
define ("paraibano","sim");
$p= get_defined_constants(false);

$paraiba = $p['paraibano'];
echo $paraiba;