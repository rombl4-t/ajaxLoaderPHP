<?php
ini_set('error_reporting', E_ALL);
$imgs = array_values(array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . '/img'), ['.', '..']));
$fileVolume = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
<a href="/">Загрузить изображения</a><br><br>
<form id="formGallery">
    <?php foreach ($imgs as $k => $v): ?>
        <?php switch (filesize('img/' . $v)) {
            case (filesize('img/' . $v)) < 10 * 1024:
                $fileVolume = (filesize('img/' . $v)) . ' b';
                break;
            case ((filesize('img/' . $v)) >= 10 * 1024) and ((filesize('img/' . $v)) < 1024 * 1024):
                $fileVolume = round(((filesize('img/' . $v)) / 1024), 1) . ' Kb';
                break;
            case (filesize('img/' . $v)) >= 1024 * 1024:
                $fileVolume = round(((filesize('img/' . $v)) / (1024 * 1024)), 1) . ' Mb';
                break;
        }
        ?>
        <input class="checkboxes" type="checkbox" name="ImgToDelete[]" value="<?= $v ?>">
        <figure class="checkboxFigure">
            <p><img width="auto" height="200px" src="img/<?= rawurlencode($v) ?>" alt="Загружаемое изображение"/></p>
            <figcaption><?= $v ?><br><?= $fileVolume ?></figcaption>
        </figure>
    <?php endforeach; ?>
    <div id="resultDel"></div>
    <input type="submit" name="delete" value="Удалить отмеченные">
</form>
<script src="/js/script.js"></script>
</body>
</html>