<?php
ini_set('error_reporting', E_ALL);

$fileMaxAmount = 5;

$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/img/';

$fileSizeLimit = 5 * 1024 * 1024;

$filesExtensionsAllowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp',];
