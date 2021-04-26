<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Categories\AgedBrie;
use GildedRose\Categories\Backstage;
use GildedRose\Categories\Conjured;
use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\StandardRules;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @var StandardRules
     */
    private $standardRules;

    /**
     * @var AgedBrie
     */
    private $agedBrie;

    /**
     * @var Backstage
     */
    private $backstage;

    /**
     * @var Conjured
     */
    private $conjured;

    // TODO refactor tests by putting in different classes
    protected function setUp(): void
    {
        $this->standardRules = new StandardRules();
        $this->agedBrie = new AgedBrie();
        $this->backstage = new Backstage();
        $this->conjured = new Conjured();
    }

    public function testStandardRules(): void
    {
        $items = [new Item('foo', 2, 5)];
        $gildedRose = new GildedRose($items, ['standardRules' => $this->standardRules]);
        $gildedRose->updateQuality();
        $this->assertSame(1, $items[0]->sell_in);
        $this->assertSame(4, $items[0]->quality);
    }

    public function testStandardRulesAfterSellInIs0(): void
    {
        $items = [new Item('foo', 0, 5)];
        $gildedRose = new GildedRose($items, ['standardRules' => $this->standardRules]);
        $gildedRose->updateQuality();
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(3, $items[0]->quality);
    }

    public function testAgedBrie(): void
    {
        $items = [new Item('Aged Brie', 2, 5)];
        $gildedRose = new GildedRose($items, ['agedBrie' => $this->agedBrie]);
        $gildedRose->updateQuality();
        $this->assertSame(1, $items[0]->sell_in);
        $this->assertSame(6, $items[0]->quality);
    }

    public function testAgedBrieQualityLimit(): void
    {
        $items = [new Item('Aged Brie', 2, 50)];
        $gildedRose = new GildedRose($items, ['agedBrie' => $this->agedBrie]);
        $gildedRose->updateQuality();
        $this->assertSame(1, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    public function testBackstage(): void
    {
        $items = [new Item('Backstage', 11, 5)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(6, $items[0]->quality);
    }

    public function testBackstageQualityLimit(): void
    {
        $items = [new Item('Backstage', 11, 50)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(10, $items[0]->sell_in);
        $this->assertSame(50, $items[0]->quality);
    }

    public function testBackstage10OrLessDays(): void
    {
        $items = [new Item('Backstage', 10, 5)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(9, $items[0]->sell_in);
        $this->assertSame(7, $items[0]->quality);
    }

    public function testBackstage5OrLessDays(): void
    {
        $items = [new Item('Backstage', 5, 5)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(4, $items[0]->sell_in);
        $this->assertSame(8, $items[0]->quality);
    }

    public function testBackstageAfterConcert(): void
    {
        $items = [new Item('Backstage', 0, 50)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(-1, $items[0]->sell_in);
        $this->assertSame(0, $items[0]->quality);
    }

    public function testSulfuras(): void
    {
        $items = [new Item('Sulfuras', -5, 80)];
        $gildedRose = new GildedRose($items, ['backstage' => $this->backstage]);
        $gildedRose->updateQuality();
        $this->assertSame(-5, $items[0]->sell_in);
        $this->assertSame(80, $items[0]->quality);
    }

    public function testConjured(): void
    {
        $items = [new Item('Conjured', 2, 50)];
        $gildedRose = new GildedRose($items, ['conjured' => $this->conjured]);
        $gildedRose->updateQuality();
        $this->assertSame(1, $items[0]->sell_in);
        $this->assertSame(48, $items[0]->quality);
    }
}
