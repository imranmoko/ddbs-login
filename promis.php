<?php
function setPermissions($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;

        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            chmod($path, 0755);
            setPermissions($path);
        } else {
            chmod($path, 0644);
        }
    }
}

// Ganti '.' dengan direktori utama kamu kalau perlu
setPermissions('.');
echo "Permission telah diubah.";
?>
