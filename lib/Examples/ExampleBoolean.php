<?php

namespace NielsHoppe\JSON\Examples;

class ExampleBoolean implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\BooleanTrait;

    public function __construct ($value) {

        $this->set($value);
    }
}
