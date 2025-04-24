<?php

declare(strict_types=1);

namespace App\Tests\Model;

use App\Model\EasyReadableDate;
use PHPUnit\Framework\TestCase;

class EasyReadableDateTest extends TestCase
{
    private EasyReadableDate $easyReadableDate;

    protected function setUp(): void
    {
        $this->easyReadableDate = new EasyReadableDate();
    }

    public function testSetAndGetYear()
    {
        $this->easyReadableDate->setYear(2025);
        $this->assertEquals(2025, $this->easyReadableDate->getYear());
    }

    public function testSetAndGetMonth()
    {
        $this->easyReadableDate->setMonth(5);
        $this->assertEquals(5, $this->easyReadableDate->getMonth());
    }

    public function testSetAndGetDay()
    {
        $this->easyReadableDate->setDay(25);
        $this->assertEquals(25, $this->easyReadableDate->getDay());
    }

    public function testSetAndGetHour()
    {
        $this->easyReadableDate->setHour(15);
        $this->assertEquals(15, $this->easyReadableDate->getHour());
    }

    public function testSetAndGetMinute()
    {
        $this->easyReadableDate->setMinute(30);
        $this->assertEquals(30, $this->easyReadableDate->getMinute());
    }

    public function testSetAndGetSecond()
    {
        $this->easyReadableDate->setSecond(45);
        $this->assertEquals(45, $this->easyReadableDate->getSecond());
    }

    public function testToArray()
    {
        $this->easyReadableDate->setYear(2025);
        $this->easyReadableDate->setMonth(5);
        $this->easyReadableDate->setDay(25);
        $this->easyReadableDate->setHour(15);
        $this->easyReadableDate->setMinute(30);
        $this->easyReadableDate->setSecond(45);

        $expectedArray = [
            'year' => 2025,
            'month' => 5,
            'day' => 25,
            'hour' => 15,
            'minute' => 30,
            'second' => 45,
        ];

        $this->assertEquals($expectedArray, $this->easyReadableDate->toArray());
    }

    public function testToArrayWithNullValues()
    {
        $this->easyReadableDate->setYear(null);
        $this->easyReadableDate->setMonth(null);
        $this->easyReadableDate->setDay(null);
        $this->easyReadableDate->setHour(null);
        $this->easyReadableDate->setMinute(null);
        $this->easyReadableDate->setSecond(null);

        $expectedArray = [
            'year' => null,
            'month' => null,
            'day' => null,
            'hour' => null,
            'minute' => null,
            'second' => null,
        ];

        $this->assertEquals($expectedArray, $this->easyReadableDate->toArray());
    }
}
