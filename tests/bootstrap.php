<?php

require_once __DIR__ . '/../vendor/autoload.php';

use NunoMaduro\Collision\Provider;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;

$cloner = new VarCloner();
$fallbackDumper = \in_array(\PHP_SAPI, ['cli', 'phpdbg']) ? new CliDumper() : new HtmlDumper();
$dumper = new ServerDumper(
    'tcp://127.0.0.1:9912', $fallbackDumper,
    [
        'cli' => new CliContextProvider(),
        'source' => new SourceContextProvider(),
    ]
);

VarDumper::setHandler(
    static function ($var) use ($cloner, $dumper) {
        $dumper->dump($cloner->cloneVar($var));
    }
);

(new Provider())->register();
