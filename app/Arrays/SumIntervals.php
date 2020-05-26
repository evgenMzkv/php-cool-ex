<?php

namespace App\Arrays;

use Test\Arrays\SumIntervalsTest;

class SumIntervals
{
    /**
     * Задача из испытаний после завершения курса Hexlet - Массивы
     *
     * Задание:
     * Реализуйте функцию sumIntervals, которая принимает на вход массив интервалов и возвращает сумму всех длин интервалов.
     * В данной задаче используются только интервалы целых чисел от -100 до 100 , которые представлены в виде массива.
     * Первое значение интервала всегда будет меньше, чем второе значение.
     * Например, длина интервала [-100, 0] равна 100, а длина интервала [5, 5] равна 0.
     * Пересекающиеся интервалы должны учитываться только один раз.
     *
     * @param array $intervals
     * @return int
     *
     * @see SumIntervalsTest
     */
    public static function run(array $intervals): int
    {
        $res = [];
        foreach ($intervals as [$start, $end]) {
            if ($end == $start) {
                continue;
            }
            $full = range($start, $end);
            $res = array_merge($res, $full);
        }

        $res = array_unique($res);
        sort($res);

        $len = count($res);
        $sum = 0;
        for ($i = 0; $i <= $len - 1; $i++) {
            if (isset($res[$i + 1]) && ($res[$i + 1] == $res[$i] + 1)) {
                $sum++;
            }
        }

        return $sum;
    }

    /*
    // Решение учителя
    function sumIntervals($intervals)
    {
        $values = [];
        foreach ($intervals as [$start, $end]) {
            for ($i = $start; $i < $end; $i++) {
                $values[$i] = 1;
            }
        }
        return array_sum($values);
    }
    function sumIntervals($intervals)
    {
        $values = [];
        foreach ($intervals as [$start, $end]) {
            for ($i = $start; $i < $end; $i++) {
                $values[] = $i;
            }
        }
        $uniqValues = array_unique($values);
        return count($uniqValues);
    }
     */
}
