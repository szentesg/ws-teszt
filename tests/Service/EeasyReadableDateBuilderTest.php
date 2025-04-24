<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\EasyReadableDateBuilder;
use App\Model\EasyReadableDate;
use DateInterval;
use PHPUnit\Framework\TestCase;

class EasyReadableDateBuilderTest extends TestCase
{
    private EasyReadableDateBuilder $builder;

    protected function setUp(): void
    {
        $this->builder = new EasyReadableDateBuilder();
    }

    public function testBuildEasyReadableDateFromDiffWithValidDateInterval(): void
    {
        // Test case where we have a valid DateInterval
        $diff = new DateInterval('P1Y2M3DT4H5M6S');  // 1 year, 2 months, 3 days, 4 hours, 5 minutes, 6 seconds
        
        $result = $this->builder->buildEasyReadableDateFromDiff($diff);

        $this->assertInstanceOf(EasyReadableDate::class, $result);
        $this->assertEquals(1, $result->getYear());
        $this->assertEquals(2, $result->getMonth());
        $this->assertEquals(3, $result->getDay());
        $this->assertEquals(4, $result->getHour());
        $this->assertEquals(5, $result->getMinute());
        $this->assertEquals(6, $result->getSecond());
    }

    public function testBuildEasyReadableDateFromDiffWithNullDateInterval(): void
    {
        // Test case where the DateInterval is null
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('DateInterval cannot be null');

        $this->builder->buildEasyReadableDateFromDiff(null);
    }
}
