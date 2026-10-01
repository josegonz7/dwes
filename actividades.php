// Estrcuturas de control

// act 1 
<?php

$foo = 25;

if ($foo > 0) 
{
echo "el numero es positivo";
} 
elseif ($foo == 0) 
{
echo "el numero es cero";
} 
else 
{
echo "el numero es negativo";
}
?>

// act 2
<?php

$foo = 5;

if ($foo == 5) 
{
echo "sufciciente";
} 
elseif ($foo < 5) 
{
echo "insuficiente";
} 
elseif ($foo > 5 && $foo < 7) 
{
echo "bien";
} 
elseif ($foo >= 7 && $foo < 9)  
{
echo "notable";
}
else
{
echo "sobresaliente";
}
?>