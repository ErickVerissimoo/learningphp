<?
namespace Src\Model;

function foo(){
    echo 'ola';
}

$i = 2;
$e = 3;
/*
o php por padrão usa passagem por valor,
ou seja, os parametros das funções trabalham
com uma copia do valor que estão recebendo, 
e não o valor original em si. O operador &
habilita a passagem por referencia. Ou seja,
as mudanças que aquela variavel receber na função,
será refletida no valor original 
*/
function ref(&$x):int{
return --$x;
}

echo ref($i);

function valor(&$o){
return ++$o;
}
$v = valor($e);

echo "valor de x:".$i."\n";


$f = fn($o) => fn($y) => $o+$y;


echo $f(3)('3.4');