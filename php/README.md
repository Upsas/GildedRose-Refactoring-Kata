# GildedRose Kata - PHP Version

See the [top level readme](../README.md) for general information about this exercise. This is the PHP version of the
 GildedRose Kata. 

## Installation

The kata uses:

- PHP 7.2+
- [Composer](https://getcomposer.org)

Recommended:
- [Git](https://git-scm.com/downloads)

Clone the repository 
```
https://github.com/Upsas/GildedRose-Refactoring-Kata.git
```

Install all the dependencies using composer

```shell script
cd ./GildedRose-Refactoring-Kata/php
composer install
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) 
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Run program

`php fixtures/texttest_fixture.php`

## Folders

- `src` - contains the two folders:
  - `Categories` - contains all categories and their business logic
    - `AgedBrie.php` - this class contains all logic for Aged Brie category 
    - `Backstage.php` - this class contains all logic for Backstage category
    - `Conjured.php` - this class contains all logic for Conjured category
    - `CategoryInterface.php` - this interface implements in all categories and standard rules.
  - `Factory` - contains one class
    - `GildedRoseFactory.php` - this class has method which returns created GildedRose object.
  - `Item.php` - this class should not be changed.
  - `GildedRose.php` - this class like controller for categories, implements logic by category.
  - `StandardRules.php` - this class contains logic for items with no category.
- `tests` - contains the tests
  - `GildedRoseTest.php` - Main functionality tests.
  - `ApprovalTest.php` - alternative approval test (set to 30 days)
- `Fixture`
  - `texttest_fixture.php` used by the approval test, or can be run from the command line

## Solution

My solution to this kata:

- `separate all logic by categories in different classes.`
- `If item does not have category implement sdandard rules`
- `implement interface to all categories and standard rule classes`
- `Create factory pattern and return created GildedRose object with CategoriesInterface`
- `In GildedRose all logic is iplemented by category using interface`

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the
 root of the PHP project run:

```shell script
composer test
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
 PHPUnit `composer test` can be run:

```shell script
pu
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening **index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used. The current code is not
 upto standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
 same PHPUnit `composer check-cs` can be run:

```shell script
cc
```

### Fix Code

There are may code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
 PHPUnit `composer fix-cs` can be run:

```shell script
fc
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the
 same PHPUnit `composer phpstan` can be run:

```shell script
ps
```

**Happy coding**!