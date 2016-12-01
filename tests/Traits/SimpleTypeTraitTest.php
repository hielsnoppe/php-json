<?php

namespace NielsHoppe\JSON;

use \NielsHoppe\JSON\Traits\SimpleTypeTrait;

class TestObject {
    use SimpleTypeTrait;
}

class SimpleTypeTraitTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct () {

        $obj = new TestObject();

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
    public function testClear ($obj) {

        $obj->clear();

        $this->assertAttributeEquals(null, 'value', $obj);
        $this->assertAttributeEquals(false, 'isset', $obj);

        return $obj;
    }

    /**
     * @depends testConstruct
     * @depends testSet
     * @depends testClear
     */
    public function testTest ($obj) {

        $this->assertEquals(false, $obj->test());

        $obj->set(0);

        $this->assertEquals(true, $obj->test());

        $obj->clear();

        $this->assertEquals(false, $obj->test());
    }
}
