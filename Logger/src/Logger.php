<?php declare(strict_types=1);

namespace Acme;

final class Logger
{

    private $text = array();

    public function Log(string $userString): void
    {
        if( $userString !== '')
        {
            $this->text[] = $userString;
        }
    }

    public function GetValue() : array
    {
        return $this->text;
    }
}


?>