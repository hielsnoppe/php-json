<?php

namespace NielsHoppe\JSON\Examples;

class ExampleList implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\ListTrait;

    public function __construct ($items) {

        $this->items = $items;
    }
}
