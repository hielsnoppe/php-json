<?php

namespace NielsHoppe\JSON;

use \NielsHoppe\JSON\Traits\DictionaryTrait;

class TestObject {
    use DictionaryTrait;
}

class DictionaryTraitTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct () {

        $obj = new TestObject();

        $this->assertAttributeInternalType('string', 'items', $obj);

        return $obj;
    }

    /**
     * @depends testConstruct
     */
    public function testSet ($obj) {

        $obj->set('foo', 42);

        $this->assertAttributeContains(42, 'items', $obj);

        return $obj;
    }

    /**
     * @depends testSet
     */
    public function testGet ($obj) {

        $this->assertEquals(42, $obj->get('foo'));

        return $obj;
    }

    /**
     * @depends testGet
     */
    public function testDel ($obj) {

        $obj->del('foo');

        $this->assertAttributeNotContains(42, 'items', $obj);

        return $obj;
    }

    /**
     * @depends testConstruct
     * @depends testSet
     * @depends testDel
     */
    public function testHas ($obj) {

        $this->assertEquals(false, $obj->has('foo'));

        $obj->set('foo', 42);

        $this->assertEquals(true, $obj->has('foo'));

        $obj->del('foo');

        $this->assertEquals(false, $obj->has('foo'));
    }
}
