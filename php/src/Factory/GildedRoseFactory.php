<?php

declare(strict_types=1);

namespace GildedRose\Factory;

use GildedRose\Categories\AgedBrie;
use GildedRose\Categories\Backstage;
use GildedRose\Categories\Conjured;
use GildedRose\GildedRose;
use GildedRose\StandardRules;

class GildedRoseFactory
{
    public function createGildedRose(array $items): GildedRose
    {
        $categories = [
            'agedBrie' => new AgedBrie(),
            'backstage' => new Backstage(),
            'conjured' => new Conjured(),
            'standardRules' => new StandardRules(),
        ];

        return new GildedRose($items, $categories);
    }
}
