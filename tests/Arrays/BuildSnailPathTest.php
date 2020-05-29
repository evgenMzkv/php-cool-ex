<?php

namespace Test\Arrays;

use App\Arrays\BuildSnailPath;
use PHPUnit\Framework\TestCase;

class BuildSnailPathTest extends TestCase
{
    public function test()
    {
        $m = [
            [1,2],
            [3,4]
        ];

        $this->assertEquals([1,2,4,3], BuildSnailPath::run($m));

        $m = [
            [1, 2, 3, 1],
            [4, 5, 6, 4],
            [7, 8, 9, 7],
            [7, 8, 9, 7]
        ];

        $exp = [1, 2, 3, 1, 4, 7, 7,  9, 8, 7, 7, 4,   5, 6, 9,  8];
        $this->assertEquals($exp, BuildSnailPath::run($m));

        $m = [
            [1,2,3,4],
            [5,6,7,8],
        ];

        $this->assertEquals([1,2,3,4,8,7,6,5], BuildSnailPath::run($m));

        /**
         * 1 2 3
         * 4 5 6
         * 7 8 9
         *
         * 1 2 3 6 9  8 7 4  5
         */
        $m = [
            range(1,3),
            range(4,6),
            range(7, 9)
        ];

        $this->assertEquals([1,2,3,6,9,8,7,4,5], BuildSnailPath::run($m));
        /**
         * 1 2 3 4 5
         * 6 7 8 9 10
         * 11 12 13 14 15
         *
         */
        $m = [
            range(1,5),
            range(6,10),
            range(11,15)
        ];

        $this->assertEquals([1,2,3,4,5,10,15,14,13,12,11,6,7,8,9], BuildSnailPath::run($m));
        /**
         * 1  2  3  4  5
         * 6  7  8  9  10
         * 11 12 13 14 15
         * 16 17 18 19 20
         *
         * 1 2 3 4 5 10 15 20 - 19 18 17 16 11 6 - 7 8 9 14 - 13 12 7
         */
        $m = [
            range(1,5),
            range(6,10),
            range(11,15),
            range(16,20)
        ];

        $exp = [1,2,3,4,5,10,15,20,19,18,17,16,11,6,7,8,9,14,13,12];
        $this->assertEquals($exp, BuildSnailPath::run($m));
    }
}