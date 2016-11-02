<?php

namespace NielsHoppe\JSON\Examples;

class ExampleDictionary implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\DictionaryTrait;

    public function __construct ($items) {

        $this->items = $items;
    }
}
