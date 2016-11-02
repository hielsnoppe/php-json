<?php

namespace NielsHoppe\JSON\Examples;

class ExampleString implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\StringTrait;

    public function __construct ($value) {

        $this->set($value);
    }
}
