<?php

namespace NielsHoppe\JSON\Traits;

trait DictionaryTrait {

    /**
     * @var mixed[] $itemSchema
     */
    protected static $itemSchema;
    /**
     * @var mixed[] $items
     */
    private $items;

    /**
     * Set the value of a key
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function set ($key, $value) {

        $this->items[$key] = $value;
    }

    /**
     * Return the value of a key
     *
     * @param mixed $key  The key to look for
     *
     * @return mixed
     */
    public function get ($key) {

        if ($this->has($key)) {

            return $this->items[$key];
        }

        return null;
    }

    /**
     * Test whether or not a key exists
     *
     * @return bool
     */
    public function has ($key) {

        return array_key_exists($key, $this->items);
    }

    /**
     * Remove a key
     *
     * @param mixed $key  The key to remove
     *
     * @return bool
     */
    public function del ($key) {

        if ($this->has($key)) {

            unset($this->items[$key]);

            return true;
        }

        return false;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize () {

        return $this->items;
    }
}
