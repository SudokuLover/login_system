<?php
require_once 'core.inc.php';
session_destroy();
//header('Location: '.$http_referer);
header('Location: login.php');
?>