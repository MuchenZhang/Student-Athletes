<?php
$name = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T");

$index = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);

$sport = array("basketball&football&volleyball", "football&volleyball", "basketball&volleyball", "football&volleyball",
"football", "football", "volleyball", "basketball", "basketball", "volleyball", "basketball&volleyball",
 "football", "football&volleyball", "basketball", "basketball&volleyball", "basketball&football&volleyball",
  "football&volleyball", "volleyball", "football", "football&volleyball");

$vote = array(15, 20, 26, 13, 12, 19, 23, 21, 18, 19, 25, 20, 23, 20, 16, 24, 19, 13, 21, 22);

$gpa = array(3.1, 3.3, 3.3, 2.9, 3.2, 4.0, 3.3, 3.25, 3.75, 3.8, 3.25, 3.2, 3.65, 4.0, 3.2, 3.1, 2.7, 3.65, 4.0, 3.2);



//How many players in each sport
function playerNum($sport){

  $basketball=0;
  $football=0;
  $volleyball=0;

  for($i=0; $i<count($sport); $i++){
    if(in_array($sport[$i], array("basketball", "basketball&football", "basketball&volleyball", "basketball&football&volleyball"))){
      $basketball++;
    }

    if(in_array($sport[$i], array("football", "basketball&football", "football&volleyball", "basketball&football&volleyball"))){
      $football++;
    }

    if(in_array($sport[$i], array("volleyball", "basketball&volleyball", "football&volleyball", "basketball&football&volleyball"))){
      $volleyball++;
    }
  }
  echo $basketball. " players in basketball <br>";
  echo $football. " players in football <br>";
  echo $volleyball. " players in volleyball <br>";
}

//student id with the highest vote, not name because some names are repeated
function topVote($vote, $sport, $index, $name){
  $indexAndVote = array_combine($vote, $index);
  krsort($indexAndVote);
  //Array ( [29] => 10 [28] => 5 [26] => 3 [23] => 7 [21] => 8 [20] => 2 [19] => 6 [18] => 9 [15] => 1 [13] => 4 )

  $indexSorted = array_values($indexAndVote);
  //Array (10, 5, 3, 7, 8, 2, 6, 9, 1, 4 )

  //can be only 1
  /*$countBasketball = 0;
  $countFootball = 0;
  $countVolleyball = 0;*/

  for($i=0; $i<count($sport); $i++){
    $x = $indexSorted[$i];
    $y = $sport[$x];
    //echo $sport[$x]: volleyball basketball&football basketball&volleyball volleyball basketball football&volleyball football basketball
    //basketball&football&volleyball football&volleyball
    if(strpos($y, "basketball") !== false){
      //$countBasketball++;
      echo "Player of the year in basketball is student ".$name[$x] ." with index ".$index[$x]."<br>";
      break;
    }
  }

  for($i=0; $i<count($sport); $i++){
    $x = $indexSorted[$i];
    $y = $sport[$x];
    //echo $sport[$x]: volleyball basketball&football basketball&volleyball volleyball basketball football&volleyball football basketball
    //basketball&football&volleyball football&volleyball
    if(strpos($y, "football") !== false){
      //$countBasketball++;
      echo "Player of the year in football is student ".$name[$x] ." with index ".$index[$x]."<br>";
      break;
    }
  }

  for($i=0; $i<count($sport); $i++){
    $x = $indexSorted[$i];
    $y = $sport[$x];
    //echo $sport[$x]: volleyball basketball&football basketball&volleyball volleyball basketball football&volleyball football basketball
    //basketball&football&volleyball football&volleyball
    if(strpos($y, "volleyball") !== false){
      //$countBasketball++;
      echo "Player of the year in volleyball is student ".$name[$x] ." with index ".$index[$x]."<br>";
      break;
    }
  }

}

//Athlete of the year
//Can there be more than one person?
function yearAthlete($index, $sport, $gpa, $name){

  $avgGPA = array_sum($gpa) / count($gpa); //3.57 in this case

  $max = max($gpa); //4.0


  function findMaxIndex($gpa, $max){
    for($i=0; $i<count($gpa); $i++){
      if($gpa[$i] == $max){
        $maxIndex[] = $i;
      }
    }
    return ($maxIndex); //5, 18
  }

  $maxIndex = findMaxIndex($gpa, $max); //Array ( [0] => 5 [1] => 18 )


  for($i=0; $i<count($sport); $i++){
    if(strlen($sport[$i])>11 && $gpa[$i]>$avgGPA){
      echo "The student athlete of the year is student ".$name[$i]." with index ".$index[$i]."<br>";
    }
  }

  for($x=0; $x<count($maxIndex); $x++){
    $y = $maxIndex[$x];
    echo "The student with the highest GPA is ".$name[$y]." with the the index of ".$index[$y]."<br>";
  }
}


//honorable mention
//formula: % vote + % GPA
function honorAwardFootball($index, $name, $sport, $vote, $gpa){
  for($i=0; $i<count($sport); $i++){
      $point[] = $vote[$i] * 0.4 + $gpa[$i] * 0.6;
  }

  $pointAndIndex = array_combine($point, $index);
  krsort($pointAndIndex);//Array ( [22.2] => 13 [21.44] => 9 [20.77] => 4 [19.19] => 2)
  $indexValue = array_values($pointAndIndex); //Array ( [0] => 13 [1] => 9 [2] => 4 [3] => 2 [4] => 10

  $pointAndSport = array_combine($point, $sport);
  krsort($pointAndSport);//Array ( [22.2] => basketball [21.44] => volleyball [20.77] => football
  $sportValue = array_values($pointAndSport);//(basketball, volleyball, football...)

  for($i=0; $i<count($pointAndSport); $i++){
    if (strpos($sportValue[$i], "football") !== false){
      $x = $indexValue[$i];
      echo "The Honor Award for football goes to ".$name[$x]." with the index of ".$index[$x]."<br>";
      break;
    }
  }
}

function honorAwardBasketball($index, $name, $sport, $vote, $gpa){
  for($i=0; $i<count($sport); $i++){
      $point[] = $vote[$i] * 0.4 + $gpa[$i] * 0.6;
  }

  $pointAndIndex = array_combine($point, $index);
  krsort($pointAndIndex);//Array ( [22.2] => 13 [21.44] => 9 [20.77] => 4 [19.19] => 2)
  $indexValue = array_values($pointAndIndex); //Array ( [0] => 13 [1] => 9 [2] => 4 [3] => 2 [4] => 10

  $pointAndSport = array_combine($point, $sport);
  krsort($pointAndSport);//Array ( [22.2] => basketball [21.44] => volleyball [20.77] => football
  $sportValue = array_values($pointAndSport);//(basketball, volleyball, football...)

  for($i=0; $i<count($pointAndSport); $i++){
    if (strpos($sportValue[$i], "basketball") !== false){
      $x = $indexValue[$i];
      echo "The Honor Award for basketball goes to ".$name[$x]." with the index of ".$index[$x]."<br>";
      break;
    }
  }
}

function honorAwardVolleyball($index, $name, $sport, $vote, $gpa){
  for($i=0; $i<count($sport); $i++){
      $point[] = $vote[$i] * 0.4 + $gpa[$i] * 0.6;
  }

  $pointAndIndex = array_combine($point, $index);
  krsort($pointAndIndex);//Array ( [22.2] => 13 [21.44] => 9 [20.77] => 4 [19.19] => 2)
  $indexValue = array_values($pointAndIndex); //Array ( [0] => 13 [1] => 9 [2] => 4 [3] => 2 [4] => 10

  $pointAndSport = array_combine($point, $sport);
  krsort($pointAndSport);//Array ( [22.2] => basketball [21.44] => volleyball [20.77] => football
  $sportValue = array_values($pointAndSport);//(basketball, volleyball, football...)

  for($i=0; $i<count($pointAndSport); $i++){
    if (strpos($sportValue[$i], "volleyball") !== false){
      $x = $indexValue[$i];
      echo "The Honor Award for volleyball goes to ".$name[$x]." with the index of ".$index[$x]."<br>";
      break;
    }
  }
}


?>
