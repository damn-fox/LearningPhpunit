<?php declare(strict_types=1);

namespace Acme\Money;

final class Money
{

    private $money;

    public function __construct( $money)
    {
        $this->ensureIsValidNumber($money);

        $this->money = $money;
    }

    private function ensureIsValidNumber($money): void
    {
        if (!is_int($money)){
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid money object',$money));
        }
        
        if($money < 0){
            throw new \InvalidArgumentException(sprintf('"%s" cannot be negative',$money));
        }
    }

    public function getValue()
    {
        return $this->money;
    }

    public function add(Money $money1)
    {
        return new Money($this->money + $money1->money);
    }

    public function sub(Money $money1)
    {
        return new Money($this->money - $money1->money);
    }

}


?>