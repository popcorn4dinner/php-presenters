<?php
namespace Popcorn4dinner\Presenters;

class ForbiddenDelegationException extends AbstractDelegationException
{
    protected function composeMessage($from, $to, $methodName):string
    {
        return "Delegation from {$from} is not allowed. '{$methodName}' is not whitelisted in DELEGATED_METHODS";
    }
}
