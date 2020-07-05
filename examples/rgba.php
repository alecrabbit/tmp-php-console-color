<?php

declare(strict_types=1);

//require_once __DIR__ . '/../vendor/autoload.php'; // if repo is not cloned
require_once __DIR__ . '/../tests/bootstrap.php';

use AlecRabbit\Console\Color\Factory\StyleFactory;
use AlecRabbit\Console\Color\Style\Contracts\Defaults;
use AlecRabbit\Console\Color\Theme\Theme;

use const AlecRabbit\NO_COLOR_TERMINAL;

//$styles = new Styles();
//$styles->setStyle('comment', new Style());
//
//Themes::add('solarized', new Theme($styles));
//$theme = Themes::get('solarized');

$definitions = [
    'red' => [
        Defaults::FG => '#ff0000', // Truecolor => '#rrggbb'
    ],
    'blue' => [
        Defaults::FG => 4,  // 8bitColor => int
    ],
    'comment' => [
        Defaults::FG => [33], // 4bitColor => [int]
    ],
];
$styles = StyleFactory::createStylesFromDefinitions($definitions);
$theme = new Theme($styles);
dump($theme);
echo $theme->comment('comment', NO_COLOR_TERMINAL);
echo PHP_EOL;
echo $theme->comment('comment');
echo PHP_EOL;
