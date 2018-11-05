<?php
$incomingPW = $_GET["PASSWORD"];
$myPassword = "qlhd32ww";
date_default_timezone_set("America/Denver");

if ($incomingPW == $myPassword) {
    $directory = "../data/";
    $myfiletitle = date("Y-m-d");
    $myfile = fopen($directory . $myfiletitle . ".txt", "a+") or die("Unable to open file!");
    $txt = date("H|i|0") . "|" . $_GET["winddir"] . "|" . $_GET["windspeedmph"] . "|" . $_GET["windgustmph"]
        . "|" . $_GET["windgustdir"] . "|" . $_GET["humidity"] . "|" . $_GET["tempf"] . "|" . $_GET["rainin"]
        . "|" . $_GET["dailyrainin"] . "|" . $_GET["baromin"] . "|" . $_GET["dewptf"] . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "Update Completed successfully!!!";
} else {
    echo "Incorrect Password";
}