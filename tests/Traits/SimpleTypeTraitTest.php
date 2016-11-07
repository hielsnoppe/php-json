<?php

namespace NielsHoppe\JSON;

use \NielsHoppe\JSON\Traits\SimpleTypeTrait;

class SimpleTypeTraitTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct () {

        $obj = new class {
            use SimpleTypeTrait;
        };

        $this->assertAttributeEquals(null, 'value', $obj);
        $this->assertAttributeEquals(false, 'isset', $obj);

        return $obj;
    }

    /**
     * @depends testConstruct
     */
    public function testSet ($obj) {

        $obj->set(0);

        $this->assertAttributeEquals(0, 'value', $obj);
        $this->assertAttributeEquals(true, 'isset', $obj);

        return $obj;
    }

    /**
     * @depends testSet
     */
    public function testUnset ($obj) {

        $obj->unset();

        $this->assertAttributeEquals(null, 'value', $obj);
        $this->assertAttributeEquals(false, 'isset', $obj);

        return $obj;
    }

    /**
     * @depends testConstruct
     * @depends testSet
     * @depends testUnset
     */
    public function testIsset ($obj) {

        $this->assertEquals(false, $obj->isset());

        $obj->set(0);

        $this->assertEquals(true, $obj->isset());

        $obj->unset();

        $this->assertEquals(false, $obj->isset());
    }
}
