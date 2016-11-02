<?php

namespace NielsHoppe\JSON\Examples;

class ExampleInteger implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\IntegerTrait;

    public function __construct ($value) {

        $this->set($value);
    }
}
