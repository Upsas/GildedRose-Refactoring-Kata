<?php

declare(strict_types=1);

namespace GildedRose\Categories;

use GildedRose\Item;

class Conjured implements CategoryInterface
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality > 1) {
            $item->quality -= 2;
        } else {
            $item->quality = 0;
        }
        --$item->sell_in;
    }
}
