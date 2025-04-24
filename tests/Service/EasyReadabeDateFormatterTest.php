<?php

namespace App\Tests\Service;

use App\Enum\EasyReadableLabels;
use App\Enum\EasyReadableSeparators;
use App\Model\EasyReadableDate;
use App\Service\EasyReadableDateFormatter;
use PHPUnit\Framework\TestCase;

class EasyReadableDateFormatterTest extends TestCase
{
    private EasyReadableDateFormatter $formatter;

    protected function setUp(): void
    {
        $this->formatter = new EasyReadableDateFormatter();
    }

    public function testFormatWithSingleUnit()
    {
        $easyReadableDate = new EasyReadableDate();
        $easyReadableDate->setYear(1);

        $formattedString = $this->formatter->format($easyReadableDate);

        $this->assertEquals('1 year', $formattedString);
    }

    public function testFormatWithMultipleUnits()
    {
        $easyReadableDate = new EasyReadableDate();
        $easyReadableDate->setYear(1);
        $easyReadableDate->setMonth(2);
        $easyReadableDate->setDay(3);

        $formattedString = $this->formatter->format($easyReadableDate);

        $this->assertEquals('1 year, 2 months and 3 days', $formattedString);
    }

    public function testFormatWithNow()
    {
        $easyReadableDate = new EasyReadableDate();

        $formattedString = $this->formatter->format($easyReadableDate);

        $this->assertEquals('now', $formattedString);
    }

    public function testFormatWithEmptyDateParts()
    {
        $easyReadableDate = new EasyReadableDate();
        $easyReadableDate->setYear(0);
        $easyReadableDate->setMonth(0);
        $easyReadableDate->setDay(0);

        $formattedString = $this->formatter->format($easyReadableDate);

        $this->assertEquals('now', $formattedString);
    }

    public function testFormatWithMultipleUnitsIncludingZero()
    {
        $easyReadableDate = new EasyReadableDate();
        $easyReadableDate->setYear(0);
        $easyReadableDate->setMonth(1);
        $easyReadableDate->setDay(0);
        $easyReadableDate->setHour(5);

        $formattedString = $this->formatter->format($easyReadableDate);

        $this->assertEquals('1 month and 5 hours', $formattedString);
    }
}
