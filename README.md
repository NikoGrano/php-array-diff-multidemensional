# Array Diff Multidimensional

Based on [PHP array_diff()](http://php.net/manual/en/function.array-diff.php) 
function, but will have support for multidimesional arrays. 
[PHP.net Bug report.](https://bugs.php.net/bug.php?id=62115)

## Install

Via [composer](http://getcomposer.org):

```shell
composer require niko9911/diff-multidimensional-array
```

## Usage

```php
<?php
declare(strict-types=1);
use Niko9911\ArrayDiff\Multidimensional;


$newResults = [
	'zoo => 'pets',
	'foo' => [
        ...
	],
];

$oldResults = [
	'zoo' => 'pets',
	'foo' => [
        ...
	],
];

var_dump(ArrayDiffMultidimensional::compare($new,$old));
```

## License

Licensed under the [MIT license](http://opensource.org/licenses/MIT).
