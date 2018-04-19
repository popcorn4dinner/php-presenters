<?php

namespace Popcorn4dinner\Presenters\Examples;


class ExampleOriginal
{
    private $firstName = "Florian";
    private $lastName = "Thylman";
    private $age = 13;

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
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
