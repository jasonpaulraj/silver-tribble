<?php

function runTests()
{
    $text = "The quick brown fox jumps over the lazy dog";
    $test1 = checkIfStringHasAllUpperCase($text);
    $test2 = checkForEmptyString($text);
    $test3 = checkIfCSVCanBeCreated($text);

    $result = $test1 === true && $test2 === true && $test3 === true ? true : false;
    $test1 = $test1 === true ? 'passed' : 'failed';
    $test2 = $test2 === true ? 'passed' : 'failed';
    $test3 = $test3 ? 'passed' : 'failed';

    if ($result === true) {
        echo "\n";
        echo "All tests has passed! \n";
        echo "checkIfStringHasAllUpperCase (" . $test1 . ") \n";
        echo "checkForEmptyString (" . $test2 . ") \n";
        echo "checkIfCSVCanBeCreated (" . $test3 . ") \n";
        echo "\n";
    } else {
        echo "\n";
        echo "Some tests has failed .. \n";
        echo "checkIfStringHasAllUpperCase (" . $test1 . ") \n";
        echo "checkForEmptyString (" . $test2 . ") \n";
        echo "checkIfCSVCanBeCreated (" . $test3 . ") \n";
        echo "\n";
        runProgram(true);
        echo "\n";
    }
    echo "\n";
    runProgram(false);
    echo "\n";
}

function checkIfStringHasAllUpperCase($text)
{
    return preg_match("/^[^a-z]+$/", uppercaseString($text)) === 1 ? true : false;
}

function checkForEmptyString($text)
{
    return empty($text) ? false : true;
}

function checkIfCSVCanBeCreated($text)
{
    $result = generateCSV($text);

    if (file_exists($result)) {
        unlink($result);
        return true;
    } else {
        return false;
    }
}
