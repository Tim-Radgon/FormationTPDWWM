<?php

class DayOfTheWeek
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function jours()
    {
        $date = $this->date;
        $dateArray = explode("-", $date);
        $c = intdiv(14 - $dateArray[1], 12);
        $a = $dateArray[0] - $c;
        $m = $dateArray[1] + 12 * $c - 2;
        $j = ($dateArray[2] + $a + intdiv($a, 4) - intdiv($a, 100) + intdiv($a, 400) + intdiv((31 * $m), 12)) % 7;
        $jours = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
        return $jours[$j];
    }
}
