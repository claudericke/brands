<?php

require_once '../common.php';

$sEmailAddress = $_POST['email'];
$sPassword = $_POST['password'];

if (Login::logUserIn($sEmailAddress, $sPassword) === false) {
    echo "failed";
} else {
    echo "successful";
}