<?php

if (isset($_REQUEST['file'])) {
    $mixManifest = json_decode(file_get_contents('../public/mix-manifest.json'), true);

    foreach ($mixManifest as $key => $value){
        if ($_REQUEST['file'] == $key) {
            echo $value;
        }
    }
} else {
    header('Location: ../');
}
