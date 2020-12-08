<?php

require 'vendor/autoload.php';

use Jenssegers\Blade\Blade;

$blade = new Blade('resources/views', 'cache');

$blade->directive('page', function ($page) {
    if ($page == "'/'") {
        return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    } else {
        $pageName = str_replace("'", '', $page);

        return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . $pageName;
    }
});

$blade->directive('assets', function ($type) {
    $result = '';
    $assetType = str_replace("'", '', $type);
    $fontsJson = json_decode(file_get_contents('resources/jsons/fonts.json'), true);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    if ($assetType == 'fonts-as-style') {
        foreach ($fontsJson as $obj){
            $fontName = $obj['name'];
            $fontNameReplaced = str_replace(' ', '', $fontName);

            foreach ($obj['weights'] as $weight) {
                $i = 0;
                $result .= "\r            @font-face {\r                font-family: '{$fontName}';\r                src: ";

                foreach ($obj['extensions'] as $extension) {
                    $i++;

                    if ($weight['weight'] == '100') {
                        $fontWeight = 'Thin';
                    } elseif ($weight['weight'] == '200') {
                        $fontWeight = 'ExtraLight';
                    } elseif ($weight['weight'] == '300') {
                        $fontWeight = 'Light';
                    } elseif ($weight['weight'] == '400') {
                        $fontWeight = 'Regular';
                    } elseif ($weight['weight'] == '500') {
                        $fontWeight = 'Medium';
                    } elseif ($weight['weight'] == '600') {
                        $fontWeight = 'SemiBold';
                    } elseif ($weight['weight'] == '700') {
                        $fontWeight = 'Bold';
                    } elseif ($weight['weight'] == '800') {
                        $fontWeight = 'ExtraBold';
                    } elseif ($weight['weight'] == '900') {
                        $fontWeight = 'Black';
                    }

                    if ($weight['style'] == 'italic') {
                        $fontWeight = $fontWeight . 'Italic';
                    }

                    if(count($obj['extensions']) == $i) {
                        $ending = ';';
                    } else {
                        $ending = ',';
                    }

                    $result .= "\r                     url('{$url}public/fonts/{$fontNameReplaced}-{$fontWeight}.{$extension['ext']}') format('{$extension['format']}'){$ending}";
                }

                $result .= "\r                font-weight: {$weight['weight']};\r                font-style: {$weight['style']};\r                font-display: swap;\r            }\r";
            }
        }
    }

    if ($assetType == 'fonts-as-link') {
        foreach ($fontsJson as $obj){
            $fontName = $obj['name'];
            $fontNameReplaced = str_replace(' ', '', $fontName);

            foreach ($obj['weights'] as $weight) {
                foreach ($obj['extensions'] as $extension) {
                    if ($weight['weight'] == '100') {
                        $fontWeight = 'Thin';
                    } elseif ($weight['weight'] == '200') {
                        $fontWeight = 'ExtraLight';
                    } elseif ($weight['weight'] == '300') {
                        $fontWeight = 'Light';
                    } elseif ($weight['weight'] == '400') {
                        $fontWeight = 'Regular';
                    } elseif ($weight['weight'] == '500') {
                        $fontWeight = 'Medium';
                    } elseif ($weight['weight'] == '600') {
                        $fontWeight = 'SemiBold';
                    } elseif ($weight['weight'] == '700') {
                        $fontWeight = 'Bold';
                    } elseif ($weight['weight'] == '800') {
                        $fontWeight = 'ExtraBold';
                    } elseif ($weight['weight'] == '900') {
                        $fontWeight = 'Black';
                    }

                    if ($weight['style'] == 'italic') {
                        $fontWeight = $fontWeight . 'Italic';
                    }

                    if ($extension['ext'] === 'woff' || $extension['ext'] === 'woff2') {
                        $result .= "\r        <link rel=\"preload\" href=\"{$url}public/fonts/{$fontNameReplaced}-{$fontWeight}.{$extension['ext']}\" as=\"font\" type=\"font/{$extension['ext']}\" crossorigin>";
                    }
                }
            }
        }
    }

    return $result;
});
