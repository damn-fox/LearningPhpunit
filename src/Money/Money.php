<?php declare(strict_types=1);

namespace Acme\Money;

final class Money
{

    private $money;

    private function __construct( $money)
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

    public static function fromMoney($money): self
    {
        return new self($money);
    }

    public function getValue()
    {
        return $this->money;
    }

    public static function addingObjects($money1,$money2)
    {
        $var1 =Money::fromMoney($money1)->money;
        $var2 =Money::fromMoney($money2)->money;
        return Money::fromMoney($var1 + $var2);
    }

    public static function subtractingObjects($money1,$money2)
    {
        $var1 =Money::fromMoney($money1)->money;
        $var2 =Money::fromMoney($money2)->money;
        return Money::fromMoney($var1 - $var2);
    }

}


?>