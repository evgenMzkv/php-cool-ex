<?php

namespace Test\Arrays;

use PHPUnit\Framework\TestCase;
use App\Arrays\SumIntervals;

class SumIntervalsTest extends TestCase
{
    public function test()
    {
        $this->assertEquals(0, SumIntervals::run([[5, 5]]));

        $this->assertEquals(7, SumIntervals::run([[3, 10]]));

        $this->assertEquals(100, SumIntervals::run([[-100, 0]]));

        $this->assertEquals(2, SumIntervals::run([
                                                [1, 2],
                                                [11, 12]
                                            ]));

        $this->assertEquals(5, SumIntervals::run([
                                                [2, 7],
                                                [6, 6]
                                            ]));

        $this->assertEquals(9, SumIntervals::run([
                                                [1, 5],
                                                [1, 10]
                                            ]));

        $this->assertEquals(11, SumIntervals::run([
                                                 [1, 9],
                                                 [7, 12],
                                                 [3, 4]
                                             ]));

        $this->assertEquals(17, SumIntervals::run([
                                                 [-7, 10],
                                                 [1, 4],
                                                 [2, 5],
                                             ]));

        $this->assertEquals(110, SumIntervals::run([
                                                  [1, 5],
                                                  [-10, 19],
                                                  [1, 7],
                                                  [16, 100],
                                                  [5, 11]
                                              ]));
    }
}