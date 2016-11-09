<?php

namespace NielsHoppe\JSON\Examples;

use \NielsHoppe\JSON\PHPUnit\ObjectTraitTest;

//class ExampleObjectTest extends \PHPUnit_Framework_TestCase {
class ExampleObjectTest extends ObjectTraitTest {

    static $class = ExampleObject::class;

    public function testMain () {

        $obj = new ExampleObject();

        $actual = $obj->jsonSerialize();
        $expected = array(
            'name' => 'Example', // string
            'answer' => 42, // integer
            'pi' => 3.1415, // number
            'isExample' => true, // bool,
            'ducks' => array(
                'Huey', 'Dewey', 'Louie'
            ),
            'words' => array(
                'Huey' => 'Tick',
                'Dewey' => 'Trick',
                'Louie' => 'Track'
            ),
            'greeting' => 'hello'
        );

        $this->assertEquals($expected, $actual,
            ''
        );
    }
}
