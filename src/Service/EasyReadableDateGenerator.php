<?php

namespace App\Service;

use App\Enum\EasyReadableLabels;
use App\Service\EasyReadableDateBuilder;
use App\Service\EasyReadableDateFormatter;
use DateInterval;
use DateTime;

class EasyReadableDateGenerator
{
    public function __construct(
        private EasyReadableDateBuilder $builderService,
        private EasyReadableDateFormatter $formatterService,
        )
    {

    }

    /**
     * Generate easy readable string from second number
     *
     * @param integer|null $secondNumber
     * @return string
     */
    public function generateFromSeconds(?int $secondNumber): string
    {
        if ($secondNumber === null) {
            return EasyReadableLabels::NOW->value;
        }

        $start = new DateTime();
        $end = (clone $start)->add(new DateInterval('PT' . $secondNumber . 'S'));
        $diff = $start->diff($end);

        $easyReadableDate = $this->builderService->buildEasyReadableDateFromDiff($diff);
        $easyReadableDateString = $this->formatterService->format($easyReadableDate);

        return $easyReadableDateString;
    }
}