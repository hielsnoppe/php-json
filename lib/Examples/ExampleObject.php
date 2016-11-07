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

    protected $schema = array(
        'properties' => [
            'name' => [
                'property' => 'name'
            ]
        ]
    );

    public function __construct () {

        $this->name = new ExampleString('Example');
        $this->answer = new ExampleInteger(42);
        $this->pi = new ExampleNumber(3.1415);
        $this->isExample = new ExampleBoolean(true);
        $this->ducks = new ExampleList(array('Huey', 'Dewey', 'Louie'));
        $this->words = new ExampleDictionary(array(
            'Huey' => 'Tick',
            'Dewey' => 'Trick',
            'Louie' => 'Track'
        ));
    }
}
