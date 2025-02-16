<?

$frutas = ['banana', 'uva','maçã', 'melancia'];
$vegetais = ['salada', 'tomate','lichia', 'cebola'];
$merged=array_merge($frutas, $vegetais);
print_r($merged);
echo array_search('melancia', $merged);
$dewapered = [...$merged];

print_r($dewapered);

$a = [1,2,3];
$b=['erick','derick','miguel'];
$c = array_combine($a,$b);

print_r($c[2]);
