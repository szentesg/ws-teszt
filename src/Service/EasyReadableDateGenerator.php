<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\EasyReadableLabels;
use App\Service\EasyReadableDateBuilder;
use App\Service\EasyReadableDateFormatter;
use DateInterval;
use DateTime;

class EasyReadableDateGenerator
{
    private const MAX_SECOND_NUMBER = 315574442400;
    
    public function __construct(
        public readonly EasyReadableDateBuilder $builderService,
        public readonly EasyReadableDateFormatter $formatterService,
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
        if ($secondNumber > self::MAX_SECOND_NUMBER) {
            //limited nearby 10.000 years :)
            throw new \InvalidArgumentException('Second number is too big');
        }
        
        if ($secondNumber === null || $secondNumber === 0) {
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