<?php

declare(strict_types=1);

namespace GildedRose\Categories;

use GildedRose\Item;

class Backstage implements CategoryInterface
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality < 50) {
            ++$item->quality;

            if ($item->sell_in < 11 && $item->quality !== 50) {
                ++$item->quality;
            }

            if ($item->sell_in < 6 && $item->quality !== 50) {
                ++$item->quality;
            }
        }

        if ($item->sell_in < 1) {
            $item->quality = 0;
        }
        --$item->sell_in;
    }
}
