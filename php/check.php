<?php

date_default_timezone_set('Europe/Moscow');
$currentTime = date("H:i:s");
function check($x, $y, $r)
{
    return in_array($x, array(-3, -2, -1, 0, 1, 2, 3, 4, 5)) || is_numeric($y) || $y <= -6 || $y >= 6 || in_array($r, array(1, 2, 3, 4, 5));
}

function checkValue($x, $y, $r){
    if (($x >= -$r && $x <= 0 && $y <= $r && $y >= 0) || ($y >= (-$x - $r) && $y <= 0 && $x <= 0) || (($x*$x + $y*$y) <= $r*$r/4 && $x >= 0 && $y >= 0)){
        return "<span style='color: green'>True</span>";
    } else {
        return "<span style='color: red'>False</span>";
    }

}

session_start();
$start = microtime(true);

$x = (int) $_POST['x_value'];
$y = (float) str_replace(",", ".", $_POST['y_value']);
$r = (int) $_POST['r_value'];

if (!check($x, $y, $r)) {
    http_response_code(400);
    return;
}
$res = checkValue($x, $y, $r);

$runtime = microtime(true) - $start;

$result = array($x, $y, $r, $res, $currentTime, $runtime);

if (!isset($_SESSION['userHistory'])) {
    $_SESSION['userHistory'] = array();
}

array_push($_SESSION['userHistory'], $result);

include "table.php";