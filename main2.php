function pr($a){
    echo "[";
    foreach ($a as $e){
        echo $e.',';
    }
    echo "]";
}

 
function findPositions($arr, $x) {
  $output = [];
  $o      =[];
  for($i=0; $i<count($arr); $i++){
    $o[$i]=$i+1;
  }
 // pr($o);
  for($i=0; $i<$x; $i++){
    $h = array_slice($arr, 0, $x);
    $h_= array_slice($o  , 0, $x);
    
    $e = array_slice($arr, $x);
    $e_= array_slice($o  , $x);
    //pr($e);
    
    $max = max($h); echo "max:".$max;
    $pos = array_search($max, $h);
    
    $output[]=$h_[$pos];
    for($j=0; $j<$x && $j<count($h); $j++){
      if($j != $pos){
        $v=($h[$j]>0)?$h[$j]-1:0;
        array_push($e, $v);
        array_push($e_, $h_[$j]);
      }
    }
    $arr = $e;
    $o   = $e_;
    
    //pr($o);
   // pr($e);
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
