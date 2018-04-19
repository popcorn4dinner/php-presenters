<?php

namespace Popcorn4dinner\Presenters;

class AbstractPresenter
{
    protected const DELEGATED_METHODS = [];

    private $original;

    public function __construct($original)
    {
        $this->original = $original;
    }

    function __call($methodName, $arguments)
    {
        if (!$this->isAllowedToBeDelegated($methodName)) {
            throw new ForbiddenDelegationException($this, $this->original, $methodName);
        }

        if (!$this->isSaveToDelegate($methodName)) {
            throw new DelegationException($this, $this->original, $methodName);
        }

        return call_user_func_array([$this->original, $methodName], $arguments);
    }

    private function isSaveToDelegate($methodName): bool
    {
        return in_array($methodName, static::DELEGATED_METHODS);
    }

    private function isAllowedToBeDelegated($methodName): bool
    {
        return method_exists($this->original, $methodName);
    }
}
