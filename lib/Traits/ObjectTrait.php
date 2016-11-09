<?php

namespace NielsHoppe\JSON\Traits;

trait ObjectTrait {

    /**
     * @param string $property  Property name
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function get ($property) {

        static::failOnMissingProperty($property);

        $objectProperty = static::getObjectProperty($property);

        if (isset($objectProperty)) {

            return $this->$objectProperty;
        }

        $objectMethod = static::getObjectMethod($property);

        if (isset($objectMethod)) {

            return call_user_func_array(
                array($this, $objectMethod),
                array()
            );
        }

        /*
         * Circumstances under which this can happen can be prevented through
         * unit testing. If this exception is thrown on a live system, fire the
         * responsible developer.
         */
        throw new \Exception('Error in schema specification.');
    }

    /**
     * @param string $property
     * @param mixed $value
     * @param boolean $validate
     *
     * @return boolean
     *
     * @throws \Exception
     */
    public function set ($property, $value, $validate = true) {

        static::failOnMissingProperty($property);

        $objectProperty = static::getObjectProperty($property);

        if (isset($objectProperty)) {

            $this->$objectProperty = $value;

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function hasProperty ($property) {

        return array_key_exists($property, static::$schema['properties']);
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize () {

        $result = array();

        foreach (static::$schema['properties'] as $property => $schema) {

            $result[$property] = $this->get($property);
        }

        return $result;
    }

    /*
     * End of public interface methods.
     * Private and protected internal methods below.
     */

    /**
     * @param string $property
     *
     * @return string
     */
    protected static function getObjectProperty ($property) {

        if (array_key_exists('property', static::$schema['properties'][$property])) {

            return static::$schema['properties'][$property]['property'];
        }

        if (array_key_exists('method', static::$schema['properties'][$property])) {

            return null;
        }

        return $property;
    }

    /**
     * @param string $property
     *
     * @return string
     */
    protected static function getObjectMethod ($property) {

        if (array_key_exists('method', static::$schema['properties'][$property])) {

            return static::$schema['properties'][$property]['method'];
        }

        return null;
    }

    /**
     * @param string $property
     *
     * @throws \Exception
     */
    protected static function failOnMissingProperty ($property) {

        if (!static::hasProperty($property)) {

            throw new \Exception(sprintf('Undefined property: %s::$%s', static::class, $property));
        }
    }
}
