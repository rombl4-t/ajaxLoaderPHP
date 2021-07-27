<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

$accept = implode(',', str_replace('image/', ' .', $filesExtensionsAllowed));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
<form id="data">
    <input name="loadingImg[]" type="file" multiple="multiple" accept="<?= $accept ?>"/><br>
    <br>
    <input type="submit" name="upload" value="Отправить">
</form>
<br>
<a href="/gallery.php">В галерею</a>
<br>
<br>
<div id="result"></div>
<script src="/js/script.js"></script>
</body>

</html>
