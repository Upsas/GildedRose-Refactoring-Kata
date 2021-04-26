<?php

declare(strict_types=1);

namespace GildedRose\Categories;

use GildedRose\Item;

interface CategoryInterface
{
    public function updateQuality(Item $item): void;
}
