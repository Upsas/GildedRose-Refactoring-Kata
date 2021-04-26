<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Categories\CategoryInterface;

class StandardRules implements CategoryInterface
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality < 1) {
            $item->quality = 0;
        } elseif ($item->sell_in < 1) {
            $item->quality -= 2;
        } else {
            --$item->quality;
        }
        --$item->sell_in;
    }
}
