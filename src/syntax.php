<?php

// $var = ['Caleb', 'Joshua'];
// // print_r($var);
// // print(is_array($var));

// //constants
// // define('PI', 3.14);
// // print PI;

// for ($i=0; $i < count($var); $i++) {
//   print($var[$i]);
// }

// foreach ($var as $i) {
//   print($i);
// }

// $findme    = 'a';
// $mystring1 = 'xyz';
// $mystring2 = 'ABC';

// $pos1 = stripos($mystring1, $findme);
// $pos2 = stripos($mystring2, $findme);

// // Nope, 'a' is certainly not in 'xyz'
// if ($pos1 === false) {
//     echo "The string '$findme' was not found in the string '$mystring1'";
// }

// // Note our use of ===.  Simply == would not work as expected
// // because the position of 'a' is the 0th (first) character.
// if ($pos2 !== false) {
//     echo "We found '$findme' in '$mystring2' at position $pos2";
// }

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
print_r($array1);
print '<br>';
function odd ($var) {

  return ($var % 2);
}

print_r(array_filter($array1, "odd"));
print '<br>';

$var = 4;

if ($var === 4) print 'good';
print '<br>';

$userRole = 'admin';

switch ($userRole) {
  case 'admin':
    print 'admin';
    break;

  case 'editor':
    print 'editor';

  default:
    print 'user';
    break;
}
