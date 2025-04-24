<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\EasyReadableDate;
use DateInterval;

class EasyReadableDateBuilder
{
    /**
     * Converts a DateInterval object into an EasyReadableDate object
     *
     * @param DateInterval|null $diff
     * @return EasyReadableDate
     */
    public function buildEasyReadableDateFromDiff(?DateInterval $diff): EasyReadableDate
    {
        if ($diff === null) {
            throw new \InvalidArgumentException('DateInterval cannot be null');
        }

        return (new EasyReadableDate)
            ->setYear($diff->y)
            ->setMonth($diff->m)
            ->setDay($diff->d)
            ->setHour($diff->h)
            ->setMinute($diff->i)
            ->setSecond($diff->s)
        ;
    }
}