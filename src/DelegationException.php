<?php
namespace Popcorn4dinner\Presenters;

class DelegationException extends AbstractDelegationException
{
    protected function composeMessage($from, $to, $methodName):string
    {
        return "Delegation from {$from} failed. {$to} doesn't respond to method {$methodName}";
    }
}
