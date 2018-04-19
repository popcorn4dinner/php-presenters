<?php

namespace Popcorn4dinner\Presenters;

abstract class AbstractDelegationException extends \RuntimeException
{


    /**
     * DelegationException constructor.
     * @param string $instance
     * @param string $methodName
     */
    public function __construct($from, $to, string $methodName)
    {
        $from = get_class($from);
        $to = get_class($to);

        parent::__construct($this->composeMessage($from, $to, $methodName));
    }

    abstract protected function composeMessage($from, $to, $methodName): string;
}
