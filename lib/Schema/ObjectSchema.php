<?php

namespace NielsHoppe\JSON\Schema;

trait ObjectSchema {

    /*
     * Only applicable for "real" objects
     */

    /**
     * @var mixed[]
     */
    protected $properties;

    /*
     * Only applicable for dictionaries
     */

    /**
     * @var mixed[]
     */
    protected $additionalProperties;
    /**
     * @var int
     */
    protected $minProperties;
    /**
     * @var int
     */
    protected $maxProperties;

    /*
     * Applicable for "real" objects and dictionaries
     */

    protected $required;

    /*
     * Not supported
     */

    /**
     * @var mixed[]
     */
    protected $patternProperties;
    /**
     * @var mixed[]
     */
    protected $dependencies;

    /**
     * @return mixed[]
     */
    public function jsonSerialize () {

        return array();
    }
}
