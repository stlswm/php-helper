<?php

namespace stlswm\PHPHelper\date;

/**
 * Class Diff
 * @package PHPHelper\data
 * 日期差值
 */
class Diff
{
    /**
     * 返回两个日期相关的月份与天
     * @param  string  $date1
     * @param  string  $date2
     * @return array [month,day]
     */
    public static function monthDay(string $date1, string $date2): array
    {
        $dateStart = date('Y-m-d', strtotime($date1));
        if (strtotime($dateStart) > strtotime($date2)) {
            $tmp = $date2;
            $date2 = $dateStart;
            $dateStart = $tmp;
        }
        [$Y1, $m1, $d1] = explode('-', $dateStart);
        [$Y2, $m2, $d2] = explode('-', $date2);
        $Y = $Y2 - $Y1;
        $m = $m2 - $m1;
        $d = $d2 - $d1;
        if ($d < 0) {
            $d += (int)date('t', strtotime("-1 month $date2"));
            $m--;
        }
        if ($m < 0) {
            $m += 12;
            $Y--;
        }
        $res['month'] = 0;
        if ($Y == 0) {
            $res['month'] = $m;
            $res['day'] = $d;
            return $res;
        } elseif ($Y == 0 && $m == 0) {
            $res['day'] = $d;
            return $res;
        } else {
            $res['month'] = $m + $Y * 12;
            $res['day'] = $d;
            return $res;
        }
    }
}