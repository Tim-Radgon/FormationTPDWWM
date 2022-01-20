<?php

class Bandwidth
{
    private $bit;
    private $val1;
    private $val2;


    public function __construct($bit, $val1, $val2)
    {
        $this->bit = $bit;
        $this->val1 = $val1;
        $this->val2 = $val2;
    }

    public function result()
    {
        $unity = ["b" => 1, "kb" => 1 / 1e3, "mb" => 1 / 1e6, "gb" => 1 / 1e9, "o" => 1 / 8, "ko" => 1 / 8e3, "mo" => 1 / 8e6, "go" => 1 / 8e9];

        $ratio1 = $unity[$this->val1];
        $ratio2 = $unity[$this->val2];

        return $this->bit * $ratio1 / $ratio2;
    }
}
