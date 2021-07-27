<?php
$imgs = array_values(array_diff(scandir($_SERVER['DOCUMENT_ROOT'] . '/img'), ['.', '..']));
$filesToDelete = $_POST['ImgToDelete'] ?? [];
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/img/';


if (!empty($filesToDelete)) {
    foreach ($filesToDelete as $file) {
        if (strpos(realpath($uploadPath . $file), realpath($uploadPath)) === 0 && (in_array($file, scandir($uploadPath)))) {
            if (unlink($uploadPath . $file)) {
                echo "Файл $file удален" . "<br>";
            }
        }
    }
}

