<?php

namespace NielsHoppe\JSON\Traits;

trait SimpleTypeTrait {

    /**
     * @var mixed
     */
    private $value = null;
    /**
     * @var bool
     */
    private $isset = false;

    /**
     * Returns the value of this
     * @return mixed | null
     */
    public function get () {

        return $this->value;
    }

    /**
     * Compares the value of this with another boolean value
     * @param bool $value
     * @return bool
     */
    public function is ($value) {

        if ($this->isset) {

            return $this->value === $value;
        }

        return false;
    }

    /**
     * Sets the value of this to the given boolean value
     * @param bool $value
     */
    public function set ($value) {

        $this->value = boolval($value);
        $this->isset = true;
    }

    /**
     * Unsets the value of this
     */
    public function clear () {

        $this->value = null;
        $this->isset = false;
    }

    /**
     * Test whether the value of this is set
     * @return bool
     */
    public function test () {

        return $this->isset;
    }

    /**
     * @return bool
     */
    public function jsonSerialize () {

        return $this->get();
    }
}
