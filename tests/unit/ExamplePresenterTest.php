<?php

namespace Popcorn4dinner\Presenters\Tests;

use PHPUnit\Framework\TestCase;
use Popcorn4dinner\Presenters\Examples\ExampleOriginal;
use Popcorn4dinner\Presenters\Examples\ExamplePresenter;
use Popcorn4dinner\Presenters\DelegationException;

class ExamplePresenterTest extends TestCase
{

    private $presenter;
    private $original;

    function setUp()
    {
        parent::setUp();

        $this->original = new ExampleOriginal();
        $this->presenter = new ExamplePresenter($this->original);
    }

    function test_thatPresenterRespondsToAllMethodsOfJobOffer()
    {
        $methodNames = get_class_methods($this->original);
        $notAllowedMethods = ['__construct'];

        foreach ($methodNames as $methodName){
            if(!in_array($methodName, $notAllowedMethods)){
                $this->assertTrue(is_callable([$this->presenter, $methodName]), "Method '{$methodName}' should be callable");
            }
        }

    }

    /**
     * @expectedException \Popcorn4dinner\Presenters\DelegationException
     */
    function test_presenter_throwsDelegationException_whenMethodNotFound()
    {
        $this->presenter->somethingThatDoesNotExist();
    }

    /**
     * @expectedException \Popcorn4dinner\Presenters\ForbiddenDelegationException
     */
    function test_presenter_throwsDelegationException_whenMethodNotWhitelisted()
    {
        $this->presenter->somethingForbidden();
    }




}
