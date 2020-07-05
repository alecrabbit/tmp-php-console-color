<?php

declare(strict_types=1);

//require_once __DIR__ . '/../vendor/autoload.php'; // if repo is not cloned
use AlecRabbit\Color\ColorFactory;
use AlecRabbit\Color\Contracts\RGBaInterface;

require_once __DIR__ . '/../tests/bootstrap.php';

$c = ColorFactory::fromRGBaValues(10, 10, 10, 10);

display($c);
$modified = $c->setAlfa(1);
display($modified);

echo sprintf('ObjectIDs: %u <> %u', spl_object_id($c), spl_object_id($modified)) . PHP_EOL;

dump($c, $modified);

/**
 * @param RGBaInterface $c
 */
function display(RGBaInterface $c): void
{
    echo $c->hex() . PHP_EOL;
    echo $c->hex(true) . PHP_EOL;
    echo $c->rgba() . PHP_EOL;
    echo $c->rgb() . PHP_EOL;
    echo PHP_EOL . PHP_EOL;
}
