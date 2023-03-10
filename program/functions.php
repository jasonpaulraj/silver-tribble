<?php

require __DIR__ . "/test_units.php";

function runProgram($initial = true)
{
    if ($initial == false) {
        echo "Press 1 to go back to menu or 2 to exit. \n";
        echo "1. Go back to menu\n";
        echo "2. Exit Program\n";
        echo "\n";

        $menuchoice = trim(fgets(STDIN));

        if ($menuchoice == 1) {
            runProgram();
        } else {
            exit();
        }
    }

    echo "Type number of your choice below: \n";
    echo "1. Run test unit for text tool\n";
    echo "2. Run text tool\n";
    echo "3. Exit\n";
    echo "\n";

    $menuchoice = trim(fgets(STDIN));

    echo "\n";

    if ($menuchoice != 3) {
        echo "Selected choice: " . $menuchoice . "\n";
    } else {
        echo "Exitting program ..\n";
        exit();
    }

    echo "\n";

    if ($menuchoice == 1) {
        echo "Running test cases... \n";
        echo "\n";
        runTests();
        echo "\n";
        echo "Running test cases complete... \n";
        echo "\n";
        echo "The program will now exit... \n";
        echo "\n";
        runProgram($initial = true);
        echo "\n";
    } elseif ($menuchoice == 2) {
        runScript();
    } elseif ($menuchoice == 3) {
        echo "\n";
        echo "The program will exit... \n";
        echo "\n";
        runProgram($initial = true);
        echo "\n";
    } else {
        echo "\n";
        echo "Selected choice does not exist! ... \n";
        echo "\n";
        runProgram($initial = true);
        echo "\n";
    }
}

function runScript()
{
    echo "\n";
    echo "Please input text below:\n";

    $text = trim(fgets(STDIN));

    if (!empty($text)) {

        echo "\n";
        echo "Input text: ";
        echo "\n";
        echo $text . "\n";
        echo "\n";
        echo "Processing.. \n";

        echo progress_bar(20, 100);
        sleep(1);
        echo progress_bar(40, 100);
        sleep(1);
        echo progress_bar(60, 100);
        sleep(1);
        echo progress_bar(80, 100);
        sleep(1);
        echo progress_bar(100, 100) . "\n";
        echo "\n";
        echo "\n";

        echo "1. Convert strings to uppercase: \n";
        sleep(1);
        echo uppercaseString($text) . "\n";
        sleep(1);
        echo "\n";

        echo "2. Convert the string to alternate upper and lower case: \n";
        sleep(1);
        echo alternatingString($text) . "\n";
        echo "\n";

        $csv = generateCSV($text);
        sleep(1);
        echo "\n";
        echo "Result has been saved in CSV file! Path: " . $csv . "\n";
        echo "\n";

        runProgram(false);
    } else {
        echo "No input text found!";
        exit();
    }
}

function progress_bar($done, $total, $info = "", $width = 50)
{
    $perc = round(($done * 100) / $total);
    $bar = round(($width * $perc) / 100);
    return sprintf("%s%%[%s>%s]%s\r ", $perc, str_repeat("=", $bar), str_repeat(" ", $width - $bar), $info);
}

function uppercaseString($text)
{
    try {
        if (!is_null($text) && !empty($text)) {
            $result =  strtoupper($text);
            return $result;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function alternatingString($text)
{
    try {
        if (!is_null($text) && !empty($text)) {
            $result = "";
            $vals = explode(" ", $text);
            foreach ($vals as $val) {
                $val = str_split($val);
                $newVal = "";
                foreach ($val as $key => $_val) {
                    $key % 2 == 0 ? $newVal .= strtoupper($_val) : $newVal .= strtolower($_val);
                }

                $result .= $newVal . " ";
            }
            return $result;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function generateCSV($text)
{
    try {
        if (!is_null($text) && !empty($text)) {
            if (!file_exists("downloads")) {
                mkdir("downloads", 0777, true);
            }
            $filePath = "downloads/output_" . date("YmdHis") . ".csv";
            $_string = str_split($text);
            if (count($_string) > 0) {

                $fp = fopen($filePath, "w");
                fputcsv($fp, $_string);
                fclose($fp);

                return $filePath;
            }
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
