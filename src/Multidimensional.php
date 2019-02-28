<?php

declare(strict_types=1);

/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is released under MIT license by Niko Granö.
 *
 * @copyright Niko Granö <niko9911@ironlions.fi> (https://granö.fi)
 *
 */

namespace Niko9911\ArrayDiff;

final class Multidimensional
{
    /**
     * Computes the difference of arrays with additional index check.
     *
     * @param array $array1 the array to compare from
     * @param array $arrays an array(s) to compare against
     *
     * @return array an array containing all the values from
     *               array1 that are not present in any of the other arrays
     */
    public static function diff(array $array1, ...$arrays): array
    {
        $difference = [];
        foreach ($arrays as $array2) {
            foreach ($array1 as $key => $value) {
                if (\is_array($value)) {
                    if (!isset($array2[$key]) || !\is_array($array2[$key])) {
                        $difference[$key] = $value;
                    } else {
                        $new_diff = static::diff($value, $array2[$key]);
                        if (!empty($new_diff)) {
                            $difference[$key] = $new_diff;
                        }
                    }
                } elseif (!\array_key_exists($key, $array2) || $array2[$key] !== $value) {
                    $difference[$key] = $value;
                }
            }
        }

        return $difference;
    }
}
