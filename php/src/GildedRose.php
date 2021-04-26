<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Categories\CategoryInterface;

final class GildedRose
{
    private const AGED_BRIE = 'Aged Brie';

    private const BACKSTAGE = 'Backstage';

    private const SULFURAS = 'Sulfuras';

    private const CONJURED = 'Conjured';

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var CategoryInterface[]
     */
    private $category;

    public function __construct(array $items, array $category)
    {
        $this->category = $category;
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case preg_match('/' . self::AGED_BRIE . '/', $item->name) === 1:
                    $this->category['agedBrie']->updateQuality($item);
                    break;
                case preg_match('/' . self::BACKSTAGE . '/', $item->name) === 1:
                    $this->category['backstage']->updateQuality($item);
                    break;
                case preg_match('/' . self::SULFURAS . '/', $item->name) === 1:
                    break;
                case preg_match('/' . self::CONJURED . '/', $item->name) === 1:
                    $this->category['conjured']->updateQuality($item);
                    break;
                default:
                    $this->category['standardRules']->updateQuality($item);
            }
        }
    }
}
