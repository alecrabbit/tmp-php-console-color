<?php

declare(strict_types=1);

//require_once __DIR__ . '/../vendor/autoload.php'; // if repo is not cloned
require_once __DIR__ . '/../tests/bootstrap.php';

use AlecRabbit\Console\Color\Style\Style;
use AlecRabbit\Console\Color\Style\Styles;
use AlecRabbit\Console\Color\Theme\Theme;
use AlecRabbit\Console\Color\Theme\Themes;

$styles = new Styles();
$styles->setStyle('comment', new Style());

Themes::add('solarized', new Theme($styles));
$theme = Themes::get('solarized');
echo $theme->comment('comment');
echo PHP_EOL;
