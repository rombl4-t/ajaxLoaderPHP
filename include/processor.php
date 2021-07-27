<?php
ini_set('error_reporting', E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . '/include/config.php';

if (isset($_FILES['loadingImg'])) {
    $filesAmount = count($_FILES['loadingImg']['name']);
    if ($filesAmount > $fileMaxAmount) {
        echo 'Выберите не более 5 штук';
        return;
    }
    for ($key = 0; $key < $filesAmount; $key++) {
        if (!empty($_FILES['loadingImg']['tmp_name'][$key])) {
            if (in_array(mime_content_type($_FILES['loadingImg']['tmp_name'][$key]), $filesExtensionsAllowed)) {
                if ($_FILES['loadingImg']['size'][$key] < $fileSizeLimit) {
                    if (move_uploaded_file($_FILES['loadingImg']['tmp_name'][$key], $uploadPath . basename($_FILES['loadingImg']['name'][$key]))) {
                        echo "Файл " . $_FILES['loadingImg']['name'][$key] . " загружен" . '<br>';
                    }
                } else echo 'Размер изображения не должен превышать 5 MB';
            } else echo 'Недопустимый формат изображения';
        } else echo 'Выберите файл';
    }
}
