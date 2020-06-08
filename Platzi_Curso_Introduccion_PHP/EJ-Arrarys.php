<?php
// Escribe el código necesario para generar la cadena final usando el arreglo dado
$arreglo = [

'keyStr' => 'lado',
0 => 'ledo',

'keyStr2' => 'lido',
1 => 'lodo',
2 => 'ludo'

];
foreach($arreglo as $var)
{
    echo $var.',';
}
echo '<br>decirlo al revés lo dudo.<br>';
$inverso=array_reverse($arreglo);
foreach($inverso as $var)
{
    echo $var.',';
}
echo '<br>¡Qué trabajo me ha costado!<br>';
// Lado, ledo, lido, lodo, ludo,
// decirlo al revés lo dudo.
// Ludo, lodo, lido, ledo, lado,
// ¡Qué trabajo me ha costado!

// Crea un arreglo que contenga como clave los nombres de 5 países y como valor otro arreglo con 3 ciudades que pertenezcan a ese país, después utiliza un ciclo foreach, para imprimir el nombre del país seguido de las ciudades que definiste:
$pais=[
    
        'Mexico'=>[
            'Monterrey',
            'Querétaro',
            'Guadalajara'
        ],    
        'Costa Rica'=>[
            'Puntarenas',
            'Guanacaste',
            'Alajuela'
        ]  
    
];
foreach($pais as $p=>$prov)
{
    echo' <br>'.$p.': ';
    foreach($prov as $pr)
    {
    echo $pr.',';
    }

}
//Escribe el código necesario para encontrar los 3 números más grandes y los 3 números más bajos de la siguiente lista
$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
?>
