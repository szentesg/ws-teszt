<?php

namespace App\Tests\Service;

use App\Service\EasyReadableDateBuilder;
use App\Service\EasyReadableDateFormatter;
use App\Service\EasyReadableDateGenerator;
use PHPUnit\Framework\TestCase;

class EasyReadableDateGeneratorTest extends TestCase
{
    private EasyReadableDateGenerator $generator;

    protected function setUp(): void
    {
        $builder = new EasyReadableDateBuilder();
        $formatter = new EasyReadableDateFormatter();

        $this->generator = new EasyReadableDateGenerator($builder, $formatter);
    }

    public function testGenerateNow(): void
    {
        $this->assertEquals('now', $this->generator->generateFromSeconds(null));
        $this->assertEquals('now', $this->generator->generateFromSeconds(0));
    }

    public function testGenerateSeconds(): void
    {
        $this->assertEquals('1 second', $this->generator->generateFromSeconds(1));
        $this->assertEquals('2 seconds', $this->generator->generateFromSeconds(2));
    }

    public function testGenerateMinutesAndSeconds(): void
    {
        $this->assertEquals('1 minute and 1 second', $this->generator->generateFromSeconds(61));
        $this->assertEquals('2 minutes and 5 seconds', $this->generator->generateFromSeconds(125));
    }

    public function testGenerateHoursMinutesAndSeconds(): void
    {
        $this->assertEquals('1 hour, 1 minute and 1 second', $this->generator->generateFromSeconds(3661));
        $this->assertEquals('2 hours, 5 minutes and 3 seconds', $this->generator->generateFromSeconds(7503));
    }

    public function testGenerateDays(): void
    {
        $this->assertEquals('1 day', $this->generator->generateFromSeconds(86400));
        $this->assertEquals('1 day and 1 second', $this->generator->generateFromSeconds(86401));
    }

    public function testGenerateMonths(): void
    {
        // 1 hónap ≈ 30 nap, de a DateInterval 'm' mező naptári hónap szerint számol
        $start = new \DateTimeImmutable();
        $end = $start->add(new \DateInterval('P1M'));
        $diffInSeconds = $end->getTimestamp() - $start->getTimestamp();

        $result = $this->generator->generateFromSeconds($diffInSeconds);
        $this->assertEquals('1 month', $result);

        // Teszt 2 hónapra + 1 napra
        $end = $start->add(new \DateInterval('P2M1D'));
        $diffInSeconds = $end->getTimestamp() - $start->getTimestamp();
        $result = $this->generator->generateFromSeconds($diffInSeconds);

        $this->assertEquals('2 months and 1 day', $result);
    }

    public function testGenerateYearsAndOthers(): void
    {
        $this->assertEquals('1 year', $this->generator->generateFromSeconds(31536000));
        $this->assertEquals('1 year and 1 second', $this->generator->generateFromSeconds(31536001));
        $this->assertEquals('2 years, 1 day, 3 hours, 2 minutes and 1 second', $this->generator->generateFromSeconds(2 * 31536000 + 86400 + 10800 + 120 + 1));
    }
}