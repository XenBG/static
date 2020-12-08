<?php

require 'app/core.php';

$pageData = [
    'name' => 'homepage',
    'template' => 'homepage',
    'title' => 'Homepage Title',
    'description' => 'Homepage Description',
];

echo $blade->render($pageData['template'], ['pageData' => $pageData]);
