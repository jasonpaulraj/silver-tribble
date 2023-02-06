<?php

function runTests()
{
    $text = "The quick brown fox jumps over the lazy dog";
    $test1 = checkIfStringHasAllUpperCase($text);
    $test2 = checkForEmptyString($text);
    $test3 = checkIfCSVCanBeCreated($text);

    $result = $test1 === true && $test2 === true && $test3 === true ? true : false;

    if ($result === true) {
        echo "\n";
        echo "All tests has passed! \n";
        echo "\n";
    }
    else {
        echo "\n";
        echo "Some tests has failed \n";
        echo "checkIfStringHasAllUpperCase (" . $test1 . ") \n";
        echo "checkForEmptyString (" . $test2 . ") \n";
        echo "checkIfCSVCanBeCreated (" . $test3 . ") \n";
        echo "\n";
        exit();
    }

    runProgram(false);
}

function checkIfStringHasAllUpperCase($text)
{
    $result = uppercaseString($text);
    return preg_match("/^[^a-z]+$/", $result) === 1 ? true : false;
}

function checkForEmptyString($text)
{
    return !empty($text) ? true : false;
}
function checkIfCSVCanBeCreated($text)
{
    $result = generateCSV($text);

    return $result !== 0 ? true : false;
}

