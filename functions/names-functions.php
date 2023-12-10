<?php 

function load_full_names($fileName) {
  $lineNumber = 0;

  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);

  while(!feof($FH)) {
    if($lineNumber % 2 == 0) {
        $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }

  $lineNumber++;
  $nextName = fgets($FH);
  }
  return $fullNames;
}

function load_first_names($fullNames) {
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function load_last_names($fullNames) {
  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}

function load_valid_names($fullNames, $lastNames, $firstNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
      $validLastNames[$i] = $lastNames[$i];
      $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
  }
  return $validFullNames;
}

function load_valid_last_names($lastNames) {
  for($i = 0; $i < sizeof($lastNames); $i++) {
    if(ctype_alpha($lastNames[$i])) {
      $validLastNames[$i] = $lastNames[$i];
    }
  }
  return $validLastNames;
}

function load_valid_first_names($firstNames) {
  for($i = 0; $i < sizeof($firstNames); $i++) {
    if(ctype_alpha($firstNames[$i])) {
      $validFirstNames[$i] = $firstNames[$i];
    }
  }
  return $validFirstNames;
}

function most_common_first($validFirstNames) {
  $commonFirstName = array_count_values($validFirstNames);
  arsort($commonFirstName);
  return(key($commonFirstName));
}

function count_common_first($validFirstNames, $commonFirstName) {
  $countFirst = 0;
  foreach ($validFirstNames as $validFirst) {
    if($validFirst == $commonFirstName)
    $countFirst++;
  }
  return $countFirst;
}

function most_common_last($validLastNames) {
  $commonLastName = array_count_values($validLastNames);
  arsort($commonLastName);
  return(key($commonLastName));
}

function count_common_last($validLastNames, $commonLastName) {
  $countLast = 0;
  foreach ($validLastNames as $validFirst) {
    if($validFirst == $commonLastName)
    $countLast++;
  }
  return $countLast;
}
