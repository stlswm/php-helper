<?php

namespace stlswm\PHPHelper\date;

use PHPUnit\Framework\TestCase;

require '../../vendor/autoload.php';

class DiffTest extends TestCase
{
    public function test_monthDay()
    {
        $res = Diff::monthDay('2020-01-31', '2020-02-01');
        $this->assertIsArray($res);
        $this->assertArrayHasKey('month', $res);
        $this->assertArrayHasKey('day', $res);
        $this->assertEquals(0, $res['month']);
        $this->assertEquals(1, $res['day']);
    }
}
