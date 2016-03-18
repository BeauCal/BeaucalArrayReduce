<?php

namespace BeaucalArrayReduceTest;

use BeaucalArrayReduce\ReduceTo;

class ReduceToTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider dataAllThat
     */
    public function testAllThat($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, ReduceTo::allThat($items, $predicate)
        );
    }

    public static function dataAllThat() {
        $fnIsNumeric = function($item) {
            return is_numeric($item);
        };
        $fnGtZero = function($item) {
            return ($item > 0);
        };
        $fnEqZero = function($item) {
            return ($item == 0);
        };
        return [
            [[], null, true],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, true],
            [[0, 1, 2, 3, 4, 5], $fnGtZero, false],
            [[0, 1, 2, 3, 4, 5], $fnEqZero, false]
        ];
    }

    /**
     * @dataProvider dataHasThat
     */
    public function testHasThat($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, ReduceTo::hasThat($items, $predicate)
        );
    }

    public static function dataHasThat() {
        $fnIsNumeric = function($item) {
            return is_numeric($item);
        };
        $fnGtZero = function($item) {
            return ($item > 0);
        };
        $fnEqTen = function($item) {
            return ($item == 10);
        };
        return [
            [[], null, false],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, true],
            [[0, 1, 2, 3, 4, 5], $fnGtZero, true],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, false]
        ];
    }

    /**
     * @dataProvider dataCountThat
     */
    public function testCountThat($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, ReduceTo::countThat($items, $predicate)
        );
    }

    public static function dataCountThat() {
        $fnIsNumeric = function($item) {
            return is_numeric($item);
        };
        $fnGtZero = function($item) {
            return ($item > 0);
        };
        $fnEqTen = function($item) {
            return ($item == 10);
        };
        return [
            [[], null, 0],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, 6],
            [[0, 1, 2, 3, 4, 5], $fnGtZero, 5],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, 0]
        ];
    }

    /**
     * @dataProvider dataFirstThat
     */
    public function testFirstThat($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, ReduceTo::firstThat($items, $predicate)
        );
    }

    public static function dataFirstThat() {
        $fnIsNumeric = function($item) {
            return is_numeric($item);
        };
        $fnGtZero = function($item) {
            return ($item > 0);
        };
        $fnEqTen = function($item) {
            return ($item == 10);
        };
        return [
            [[], null, null],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, 0],
            [[0, 1, 2, 3, 4, 5], $fnGtZero, 1],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, null]
        ];
    }

    /**
     * @dataProvider dataLastThat
     */
    public function testLastThat($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, ReduceTo::lastThat($items, $predicate)
        );
    }

    public static function dataLastThat() {
        $fnIsNumeric = function($item) {
            return is_numeric($item);
        };
        $fnLtFour = function($item) {
            return ($item < 4);
        };
        $fnEqTen = function($item) {
            return ($item == 10);
        };
        return [
            [[], null, null],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, 5],
            [[0, 1, 2, 3, 4, 5], $fnLtFour, 3],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, null]
        ];
    }

}
