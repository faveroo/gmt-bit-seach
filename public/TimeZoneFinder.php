<?php

class TimeZoneFinder
{
    /**
     * Summary of cities based on SDT (Standart Time) Offsets
     * @var array
     */
    protected array $citiesByMask = [
        1 << 0  => ['Baker Island'],                          // UTC-12
        1 << 1  => ['Pago Pago'],                             // UTC-11
        1 << 2  => ['Honolulu'],                              // UTC-10
        1 << 3  => ['Anchorage'],                             // UTC-9
        1 << 4  => ['Los Angeles', 'Vancouver'],              // UTC-8
        1 << 5  => ['Denver', 'Phoenix'],                     // UTC-7
        1 << 6  => ['Chicago', 'Mexico City'],                // UTC-6
        1 << 7  => ['New York', 'Washington, DC', 'Toronto'], // UTC-5
        1 << 8  => ['Santiago', 'Caracas'],                   // UTC-4
        1 << 9  => ['São Paulo', 'Buenos Aires'],             // UTC-3
        1 << 10 => ['South Georgia'],                         // UTC-2
        1 << 11 => ['Azores'],                                // UTC-1
        1 << 12 => ['London', 'Dublin', 'Lisbon'],            // UTC+0
        1 << 13 => ['Paris', 'Berlin', 'Brussels'],           // UTC+1
        1 << 14 => ['Athens', 'Cairo'],                       // UTC+2
        1 << 15 => ['Moscow', 'Istanbul'],                    // UTC+3
        1 << 16 => ['Dubai'],                                 // UTC+4
        1 << 17 => ['Karachi'],                               // UTC+5
        1 << 18 => ['Dhaka'],                                 // UTC+6
        1 << 19 => ['Bangkok', 'Jakarta'],                    // UTC+7
        1 << 20 => ['Beijing', 'Singapore'],                  // UTC+8
        1 << 21 => ['Tokyo', 'Seoul'],                        // UTC+9
        1 << 22 => ['Sydney', 'Melbourne'],                   // UTC+10
        1 << 23 => ['Noumea'],                                // UTC+11
        1 << 24 => ['Auckland', 'Wellington'],                // UTC+12
    ];

    public function findCities(int $gmt, bool $exclude = false): array
    {
        $result = [];
        $searchMask = $this->createMask($gmt);

        if ($exclude) {
            $searchMask = ~$searchMask;
        }

        
        foreach($this->citiesByMask as $mask => $cities) {
            if ($mask & $searchMask) {
                $result = array_merge($result, $cities);
            }
        }

        return $result;
    }

    private function createMask(int $gmt): int
    {
        return 1 << ($gmt + 12);
    }
}