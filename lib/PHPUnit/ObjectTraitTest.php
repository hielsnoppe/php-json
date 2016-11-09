<?php

namespace NielsHoppe\JSON\PHPUnit;

abstract class ObjectTraitTest extends \PHPUnit_Framework_TestCase {

    protected static $class;

    public function testImplementation () {

        $class = static::$class;

        $schemaReflection = new \ReflectionProperty($class, 'schema');
        $schemaReflection->setAccessible(true);
        $schema = $schemaReflection->getValue();

        $this->assertClassHasStaticAttribute('schema', $class,
            sprintf('Missing property %s::$schema', $class)
        );

        $this->assertAttributeInternalType('array', 'schema', $class,
            sprintf('Property %s::$schema is not an array', $class)
        );

        $this->assertArrayHasKey('properties', $schema,
            sprintf('Missing key \'properties\' on %s::$schema', $class)
        );

        /*
        foreach (static::$schema['properties'] as $property => $schema) {

            if (!is_array($schema)) {

                throw new \Exception(sprintf(''));
            }

            $objectProperty = array_key_exists('property', $schema) ? $schema['property'] : $property;

            if (!property_exists($objectProperty, static::class)) {

                throw new \Exception(sprintf('Missing property %s::$%s', static::class, $objectProperty));
            }
        }
        */
    }

    public function testJsonSerialize () {

        $class = static::$class;
        $obj = new $class();

        $schemaReflection = new \ReflectionProperty($class, 'schema');
        $schemaReflection->setAccessible(true);
        $schema = $schemaReflection->getValue();

        $actual = $obj->jsonSerialize();

        $actualKeys = array_keys($actual);
        $expectedKeys = array_keys($schema['properties']);

        $this->assertEquals($expectedKeys, $actualKeys,
            'Wrong number or order of properties'
        );
    }
}
