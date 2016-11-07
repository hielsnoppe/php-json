<?php

namespace NielsHoppe\JSON\Schema;

interface Schema {

    public static function validate ($candidate) {

        if (is_object($candidate)) {

        }
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize () {

        return array();
    }
}
