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

Will work like normal PHP array_diff_assoc($new, $old, $older).
Basic usage is following: 

`Multidimensional::diff(array $array1 , array $array2 [,array $...]): array`

Example:
```php
<?php
declare(strict_types=1);
use Niko9911\ArrayDiff\Multidimensional;


$newResults = [
	'zoo' => 'pets',
	'foo' => [
        'cat',
        'dog',
        'php'
	],
];

$oldResults = [
	'zoo' => 'pets',
	'foo' => [
        'php'
	],
];

var_dump(Multidimensional::diff($new,$old));
/** Will result:
  array(1) {
    'foo' =>
    array(3) {
      [0] =>
      string(3) "cat"
      [1] =>
      string(3) "dog"
      [2] =>
      string(3) "php"
    }
  }
 */
```

## License

Licensed under the [MIT license](http://opensource.org/licenses/MIT).
