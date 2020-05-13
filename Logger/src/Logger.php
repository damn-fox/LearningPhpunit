<?php declare(strict_types=1);

namespace Acme;

final class Logger
{

    private $text = array();

    public function log( $userString)
    {
        if( $userString !== '')
        {
            $this->text[] = $userString;
        }
    }

    public function getValue()
    {
        return $this->text;
    }
}


?>