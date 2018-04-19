<?php

namespace Popcorn4dinner\Presenters\Examples;


class ExampleOriginal
{
    private $age = 13;

    public function getFirstName()
    {
        return "Florian";
    }

    public function getLastName()
    {
        return "Tylman";
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($newAge)
    {
        $this->age = $newAge;
    }
}
