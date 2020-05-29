<?php

namespace App\Arrays;

use Test\Arrays\BuildSnailPathTest;

class BuildSnailPath
{
//        for ($i = 0; $i < count($matrix); $i++) {
//            if ($i == 0) {
//                for ($j = 0; $j < count($matrix[$i]); $j++) {
//                    $res[] = $matrix[$i][$j];
//                }
//            } else {
//                $res[] = $matrix[$i][count($matrix[$i]) - 1];
//            }
//        }
//
//        for ($i = 0 + 1; $i < count($matrix) - 1; $i++) {
//            if ($i == (0 + 1)) {
//                for ($j = 0 + 1; $j < count($matrix[$i]) - 1; $j++) {
//                    $res[] = $matrix[$i][$j];
//                }
//            } else {
//                $res[] = $matrix[$i][count($matrix[$i]) - 1];
//            }
//        }
//
//        print_r($res);die(PHP_EOL);

//        for ($i = count($matrix) - 1; $i > 0; $i--) {
//            if ($i == count($matrix) - 1) {
//                for ($j = count($matrix[$i]) - 1 - 1; $j > 0; $j--) {
//                    $res[] = $matrix[$i][$j];
//                }
//            } else {
//                $res[] = $matrix[$i][0];
//            }
//        }
//
//        print_r($res);die(PHP_EOL);

//        for ($i = count($matrix) - 1   - 1; $i > 0; $i--) {
//            if ($i == count($matrix) - 1   - 1) {
//                for ($j = count($matrix[$i]) - 1 - 1   - 1; $j > 0; $j--) {
//                    $res[] = $matrix[$i][$j];
//                }
//            } else {
//                $res[] = $matrix[$i][0 + 1];
//            }
//        }
//
//        print_r($res);die(PHP_EOL);

    /**
     * @param array $matrix
     * @return array
     *
     * Решение учителя:
        function rotated($matrix)
        {
            $rowsCount = count($matrix);
            [$firstRow] = $matrix;
            $columnsCount = count($firstRow);
            $rotatedMatrix = [];

            for ($i = 0; $i < $columnsCount; $i++) {
                $rotatedMatrix[$i] = [];
                for ($j = 0; $j < $rowsCount; $j++) {
                    $rotatedMatrix[$i][$j] = $matrix[$j][$columnsCount - $i - 1];
                }
            }
            return $rotatedMatrix;
        }

        function buildSnailPath($matrix)
        {
            $path = [];
            while (count($matrix) > 1) {
                [$head] = $matrix;
                $path = array_merge($path, $head);
                $tail = array_slice($matrix, 1);
                $matrix = rotated($tail);
            }
            return array_merge($path, ...$matrix);
        }
     *
     * @see BuildSnailPathTest
     */
    public static function run(array $matrix): array
    {
        $res = [];
        for ($step = 0; $step < count($matrix); $step++) {
            if ($step % 2 == 0) {
                $start = $step == 0 ? 0 : $step - 1;
                for ($i = 0 + $start; $i < count($matrix) - $start; $i++) {
                    if ($i == (0 + $start)) {
                        for ($j = 0 + $start; $j < count($matrix[$i]) - $start; $j++) {
                            $res[] = $matrix[$i][$j];
                        }
                    } else {
                        $res[] = $matrix[$i][(count($matrix[$i]) - 1) - $start];
                    }
                }
            } else {
                $offset = $step == 1 ? 0 : $step - 2;
                for ($i = count($matrix) - 1 - $offset; $i > $offset; $i--) {
                    if ($i == (count($matrix) - 1 - $offset)) {
                        for ($j = count($matrix[$i]) - 2 - $offset; $j >= $offset; $j--) {
                            $res[] = $matrix[$i][$j];
                        }
                    } else {
                        $res[] = $matrix[$i][$offset];
                    }
                }
            }
        }
        return $res;
    }
}