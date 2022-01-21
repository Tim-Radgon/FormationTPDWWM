<?php

class Edf
{
    private $consumption;
    private $power;
    private $hp;
    private $hc;

    public function __construct($consumption, $power, $hp, $hc)
    {
        $this->consumption = $consumption;
        $this->power = $power;
        $this->hp = $hp;
        $this->hc = $hc;
    }

    public function result()
    {
        $tarifs = ["3" => 0.1558, "6" => 0.1558, "9" => 0.1605, "12" => 0.1605, "15" => 0.1605, "18" => 0.1605];
        $hp = 0.1821;
        $hc = 0.1360;

        if ($this->power = "3") {
            return $tarifs[$this->power] * $this->consumption;
        } else
            return $tarifs[$this->power] * $this->consumption + $hp + $hc;
    }
}
