<?php 

namespace App\Enum;

enum EasyReadableLabels: string
{
    case YEAR = 'year';
    case MONTH = 'month';
    case DAY = 'day';
    case HOUR = 'hour';
    case MINUTE = 'minute';
    case SECOND = 'second';

    case NOW = "now";

    const PLURAL_SIGN = 's';

    /**
     * Return singular or plural label
     *
     * @param integer $counter
     * @return string
     */
    public function label(int $counter): string 
    {
        $label = match ($this) {
            self::YEAR => '%s '.self::YEAR->value.'%s',
            self::MONTH => '%s '.self::MONTH->value.'%s',
            self::DAY => '%s '.self::DAY->value.'%s',
            self::HOUR => '%s '.self::HOUR->value.'%s',
            self::MINUTE => '%s '.self::MINUTE->value.'%s',
            self::SECOND => '%s '.self::SECOND->value.'%s',
        };

        return $counter > 1 
            ? sprintf($label, $counter, self::PLURAL_SIGN) 
            : sprintf($label, $counter, '')
        ;
    }
}
