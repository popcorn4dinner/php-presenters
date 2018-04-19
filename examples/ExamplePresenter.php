<?php

namespace Popcorn4dinner\Presenters\Examples;

use Popcorn4dinner\Presenters\AbstractPresenter;

class ExamplePresenter extends AbstractPresenter
{

    protected const DELEGATED_METHODS = ['getFirstName', 'getLastName'];


    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getAge()
    {
        return $this->original->getAge() . ' years';
    }
}
