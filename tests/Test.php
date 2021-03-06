<?php

namespace BeaucalArrayReduceTest;

class ReduceToTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider dataAllMatch
     */
    public function testAllMatch($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, \BeaucalArrayReduce\allMatch($items, $predicate)
        );
    }

    public static function dataAllMatch() {
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
     * @dataProvider dataHasMatch
     */
    public function testHasMatch($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, \BeaucalArrayReduce\hasMatch($items, $predicate)
        );
    }

    public static function dataHasMatch() {
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
     * @dataProvider dataCountMatch
     */
    public function testCountMatch($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, \BeaucalArrayReduce\countMatch($items, $predicate)
        );
    }

    public static function dataCountMatch() {
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
     * @dataProvider dataFirstMatch
     */
    public function testFirstMatch($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, \BeaucalArrayReduce\firstMatch($items, $predicate)
        );
    }

    public static function dataFirstMatch() {
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
            [[0, 1, 2, 3, 4, 5], null, 1],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, 0],
            [[0, 1, 2, 3, 4, 5], $fnGtZero, 1],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, null]
        ];
    }

    /**
     * @dataProvider dataLastMatch
     */
    public function testLastMatch($items, $predicate, $expected) {
        $this->assertEquals(
        $expected, \BeaucalArrayReduce\lastMatch($items, $predicate)
        );
    }

    public static function dataLastMatch() {
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
            [[0, 1, 2, 3, 4, 5, false], null, 5],
            [[0, 1, 2, 3, 4, 5], $fnIsNumeric, 5],
            [[0, 1, 2, 3, 4, 5], $fnLtFour, 3],
            [[0, 1, 2, 3, 4, 5], $fnEqTen, null]
        ];
    }

}
