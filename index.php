<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'names-short-list.txt';

$fullNames = load_full_names($fileName);
$firstNames = load_first_names($fullNames);
$lastNames = load_last_names($fullNames);

$validFullNames = load_valid_names($fullNames, $lastNames, $firstNames);
$validLastNames = load_valid_last_names($lastNames);
$validFirstNames = load_valid_first_names($firstNames);

$commonFirstName = most_common_first($validFirstNames);
$countFirst = count_common_first($validFirstNames, $commonFirstName);

$commonLastName = most_common_last($validLastNames);
$countLast = count_common_last($validLastNames, $commonLastName);

// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidName) {
        echo "<li>$uniqueValidName</li>";
    }
echo "</ul>";

echo '<h2>Unique Last Names</h2>';
$uniqueLastNames = (array_unique($validLastNames));
echo ("<p>There are " . sizeof($uniqueLastNames) . " unique last names</p>");

echo '<h2>Unique First Names</h2>';
$uniqueFirstNames = (array_unique($validFirstNames));
echo ("<p>There are " . sizeof($uniqueFirstNames) . " unique first names</p>");

echo '<h2>Most Common Names</h2>';

echo '<p>The most common first name is ' . $commonFirstName . ', which appears ' . $countFirst . ' times.</p>';
echo '<p>The most common last name is ' . $commonLastName . ', which appears ' . $countLast . ' times.</p>';
?>
