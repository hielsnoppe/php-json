<?php

namespace NielsHoppe\JSON\Examples;

class ExampleNumber implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\NumberTrait;

    public function __construct ($value) {

        $this->set($value);
    }
}
