<?php

class TimeZoneFinder
{
    public array $cities = [
        'Moscow' => 1 << 15,
        'Paris' => 1 << 14,
        'Berlin' => 1 << 14,
        'Brussels' => 1 << 14,
        'Amsterdam' => 1 << 14,
        'Rome' => 1 << 14,
        'London' => 1 << 13,
        'Dublin' => 1 << 13,
        'New York' => 1 << 8,
        'Washington, DC' => 1 << 8,
        'St. Louis' => 1 << 7,
        'Los Angeles' => 1 << 5,
        'Tokyo' => 1 << 21,
        'Beijing' => 1 << 20,
        'Ho Chi Mihn City' => 1 << 19,
        'Mumbai' => 1 << 17
    ];

    public function findCities(int $gmt): array
    {
        $result = [];
        $masked = $this->createMask($gmt);

        foreach($this->cities as $city => $mask) {
            if($masked & $mask) {
                $result[] = $city;
            }
        }

        return $result;
    }

    public function createMask(int $gmt): string
    {
        return 1 << ($gmt + 12);
    }
}