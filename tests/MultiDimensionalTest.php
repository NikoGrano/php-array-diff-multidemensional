<?php

/** @noinspection NonSecureUniqidUsageInspection */

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

namespace Niko9911\ArrayDiff\Tests;

use Niko9911\ArrayDiff\Multidimensional as Diff;
use PHPUnit\Framework\TestCase;

final class MultiDimensionalTest extends TestCase
{
    public function testReturnsAnArray(): void
    {
        $this->assertIsArray(Diff::diff([], []));
    }

    public function testDetectsTheDifferenceOnStringValue(): void
    {
        $old = [
            'a' => 'b',
            'c' => \uniqid(),
        ];
        $new = [
            'a' => 'b',
            'c' => \uniqid(),
        ];
        $this->assertCount(1, Diff::diff($new, $old));
        $this->assertNotEmpty(Diff::diff($new, $old)['c']);
    }

    public function testDetectsChangeFromStringToArray(): void
    {
        $new = [
            'a' => 'b',
            'c' => [
                'd' => \uniqid(),
                'e' => \uniqid(),
            ],
        ];
        $old = [
            'a' => 'b',
            'c' => \uniqid(),
        ];
        $this->assertCount(1, Diff::diff($new, $old));
        $this->assertIsArray(Diff::diff($new, $old)['c']);
    }

    public function testDetectsChangesOnNestedArrays(): void
    {
        $new = [
            'a' => 'b',
            'c' => [
                'd' => 'e',
                'f' => \uniqid(),
            ],
        ];
        $old = [
            'a' => 'b',
            'c' => [
                'd' => 'e',
                'f' => \uniqid(),
            ],
        ];
        $this->assertCount(1, Diff::diff($new, $old));
        $this->assertNotEmpty(Diff::diff($new, $old)['c']['f']);
    }
}
