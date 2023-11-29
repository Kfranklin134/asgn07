<?php 

function load_full_names($fileName) {
  $lineNumber = 0;

// Load up the array
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
