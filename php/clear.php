<?php

session_start();

if (isset($_SESSION['userHistory'])) {
    $_SESSION['userHistory'] = array();
}

include "table.php";
