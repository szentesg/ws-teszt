<?php

namespace App\Model;

class EasyReadableDate
{
    private ?int $year = null;
    private ?int $month = null;
    private ?int $day = null;
    private ?int $hour = null;
    private ?int $minute = null;
    private ?int $second = null;

    /**
     * Get the value of year
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * Set the value of year
     */
    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of month
     */
    public function getMonth(): ?int
    {
        return $this->month;
    }

    /**
     * Set the value of month
     */
    public function setMonth(?int $month): self
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get the value of day
     */
    public function getDay(): ?int
    {
        return $this->day;
    }

    /**
     * Set the value of day
     */
    public function setDay(?int $day): self
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of hour
     */
    public function getHour(): ?int
    {
        return $this->hour;
    }

    /**
     * Set the value of hour
     */
    public function setHour(?int $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get the value of minute
     */
    public function getMinute(): ?int
    {
        return $this->minute;
    }

    /**
     * Set the value of minute
     */
    public function setMinute(?int $minute): self
    {
        $this->minute = $minute;

        return $this;
    }

    /**
     * Get the value of second
     */
    public function getSecond(): ?int
    {
        return $this->second;
    }

    /**
     * Set the value of second
     */
    public function setSecond(?int $second): self
    {
        $this->second = $second;

        return $this;
    }

    /**
     * Generate array from object
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'year' => $this->getYear(),
            'month' => $this->getMonth(),
            'day' => $this->getDay(),
            'hour' => $this->getHour(),
            'minute' => $this->getMinute(),
            'second' => $this->getSecond(),
        ];
    }
}