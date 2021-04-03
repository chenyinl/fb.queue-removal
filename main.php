<?php

// Add any extra import statements you may need here
function pr($arry){}
function find_max_in_first_x($arry, $x){
  $max = 0;
  $max_index=0;
  for($i=0; $i<$x && $i<count($arry); $i++){
    if($arry[$i]['v']>$max){
      $max = $arry[$i]['v'];
      $max_index = $i;
    }
  }
  return ['np'=>$max_index, 'op'=>$arry[$max_index]['o']];
}

function remove_m_from_array($arry, $m){
  $new_array = [];
  for($i=0; $i<count($arry); $i++){
    if($i!=$m){
      $new_array[]=$arry[$i];
    }
  }
  return $new_array;
}
function get_first_x($arry, $x){
  $n = [];
  for($i=0; $i<$x; $i++){
    if(isset($arry[$i])){
      $n[]=$arry[$i];
    }
  }
  return $n;
}
function get_remain_x($arry, $x){
  $n = [];
  for($i=$x; $i<count($arry); $i++){
    if(isset($arry[$i])){
      $n[]=$arry[$i];
    }
  }
  return $n;
}
function reduce_1($ar){
  $n = [];
  for($i=0; $i<count($ar); $i++){
    $n[] = [
      'v'=>$ar[$i]['v']-1,
      'o'=>$ar[$i]['o']
    ];
  }
  return $n;
}
function move_firstx_1toback($arry, $x){
  $new_ar = [];
  for($i=$x; $i<count($arry); $i++){
    $new_ar[]=$arry[$i];
  }
  for($i=0; $i<$x; $i++){
    $new_ar[]=$arry[$i];
  }
  return $new_ar;
}

// Add any helper functions you may need here

 
function findPositions($arr, $x) {
  $output = [];
  $ar_ = [];
  for($i=0; $i<count($arr); $i++){
    $ar_[$i] = [
      'v'=> $arr[$i],
      'o'=> $i
    ];
  }
  for($i=0; $i<$x; $i++){
    $firstx = get_first_x($ar_, $x);
    $remainx= get_remain_x($ar_, $x);
    $m = find_max_in_first_x($firstx, $x);
    $output[]=$m['op']+1;
    $firstx = remove_m_from_array($firstx, $m['np']);
    $firstx = reduce_1($firstx);
    $ar_ = array_merge($remainx, $firstx);

  }
  return $output;
  
}










 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom, but they are otherwise not editable!

function printInteger($n) {
  echo "[". $n ."]";
}
function printIntegerList($arr) {
  $len = count($arr);
  echo "[";
  for($i = 0; $i < $len; $i++){
    if($i !=0){
      echo ', ';
    }
    echo $arr[$i];
  }
  echo "]";

}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result)  {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printIntegerList($expected);
    echo " Your Output : ";
    printIntegerList($output);
    echo "\n";
  }
  $test_case_number += 1; 
}

$n_1 = 6;
$x_1 = 5;
$arr_1 = array(1, 2, 2, 3, 4, 5);
$expected_1 = array(5, 6, 4, 1, 2 );
$output_1 = findPositions($arr_1, $x_1);
check($expected_1, $output_1);

$n_2 = 13;
$x_2 = 4;
$arr_2 = array(2, 4, 2, 4, 3, 1, 2, 2, 3, 4, 3, 4, 4);
$expected_2 = array(2, 5, 10, 13);
$output_2 = findPositions($arr_2, $x_2);
check($expected_2, $output_2);

// Add your own test cases here

   
?>
