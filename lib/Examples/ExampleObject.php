<?php

namespace NielsHoppe\JSON\Examples;

class ExampleObject implements \JsonSerializable {

    use \NielsHoppe\JSON\Traits\ObjectTrait;
    
    /**
     * @var ExampleString
     */
    protected $name;
    /**
     * @var ExampleInteger
     */
    protected $answer;
    /**
     * @var ExampleNumber
     */
    protected $pi;
    /**
     * @var ExampleBoolean
     */
    protected $isExample;
    /**
     * @var ExampleList
     */
    protected $ducks;
    /**
     * @var ExampleDictionary
     */
    protected $words;

    protected static $schema = [
        'properties' => [
            'name' => [
                'property' => 'name',
                'type' => 'string'
            ],
            'answer' => [
                'property' => 'answer',
                'type' => 'integer'
            ],
            'pi' => [
                'property' => 'pi',
                'type' => 'number'
            ],
            'isExample' => [
                'property' => 'isExample',
                'type' => 'boolean'
            ],
            'ducks' => [
                'property' => 'ducks',
                'type' => 'array'
            ],
            'words' => [
                'property' => 'words',
                'type' => 'object'
            ],
            'greeting' => [
                'method' => 'sayHello',
                'type' => 'string'
            ]
        ]
    ];

    public function __construct () {

        $this->name = 'Example';
        $this->answer = 42;
        $this->pi = 3.1415;
        $this->isExample = true;
        $this->ducks = array('Huey', 'Dewey', 'Louie');
        $this->words = array(
            'Huey' => 'Tick',
            'Dewey' => 'Trick',
            'Louie' => 'Track'
        );
    }

    public function sayHello () {

        return 'hello';
    }
}
