<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\EasyReadableLabels;
use App\Enum\EasyReadableSeparators;
use App\Model\EasyReadableDate;

class EasyReadableDateFormatter
{
    /**
     * Format the human-readable date string according to English grammar rules
     *
     * @param EasyReadableDate $easyReadableDate
     * @return string
     */
    public function format(EasyReadableDate $easyReadableDate): string
    {
        $easyReadableDateArray = $easyReadableDate->toArray();

        $dateParts = [];
        foreach ($easyReadableDateArray as $key => $value) {
            if ($value > 0) {
                $dateParts[$key] = EasyReadableLabels::from($key)->label($value);
            }
        }

        $readableString = '';

        //make english language compatible
        if (count($dateParts) === 1) {
            $readableString = array_values($dateParts)[0];
        } elseif (count($dateParts) === 0) {
            $readableString = EasyReadableLabels::NOW->value;
        } else {
            $lastDatePart = array_pop($dateParts);
            $readableString = sprintf("%s %s %s",implode(
                sprintf("%s ",EasyReadableSeparators::COMMA->value), 
                $dateParts), 
                EasyReadableSeparators::AND->value, $lastDatePart
            );
        }

        return $readableString;
    }
}