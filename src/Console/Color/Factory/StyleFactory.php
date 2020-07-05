<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Factory;

use AlecRabbit\Color\ColorFactory;
use AlecRabbit\Console\Color\Style\Contracts\Defaults;
use AlecRabbit\Console\Color\Style\Style;
use AlecRabbit\Console\Color\Style\Styles;
use AlecRabbit\Traits\PrivateConstruct;

final class StyleFactory
{
    use PrivateConstruct;

    /**
     * @param array $definitions
     * @return Styles
     */
    public static function createStylesFromDefinitions(array $definitions): Styles
    {
        $styles = [];
        foreach ($definitions as $name => $definition) {
            $styles[] = self::createStyleFromDefinition($definition, $name);
        }
        return new Styles($styles);
    }

    /**
     * @param array $definition
     * @param string $name
     * @return Style
     */
    public static function createStyleFromDefinition(array $definition, string $name): Style
    {
        self::assertStyleDefinition($definition);
        $foreground = null;
        $background = null;
        $effect = null;
        if (array_key_exists(Defaults::FG, $definition) && $value = $definition[Defaults::FG]) {
            $foreground = ColorFactory::createRGBaFromDefinition($value);
        }
        if (array_key_exists(Defaults::BG, $definition) && $value = $definition[Defaults::BG]) {
            $background = ColorFactory::createRGBaFromDefinition($value);
        }
        if (array_key_exists(Defaults::EF, $definition) && $value = $definition[Defaults::EF]) {
            $effect = EffectFactory::createEffectFromDefinition($value);
        }
        return new Style($foreground, $background, $effect, $name);
    }

    private static function assertStyleDefinition(array $definition): void
    {
        // TODO
        dump($definition);
    }
}