<?php declare(strict_types=1);
final class Money
{

    private $money;

    private function __construct( $money)
    {
        $this->ensureIsValidNumber($money);

        $this->money = $money;
    }

    private function ensureIsValidNumber( $money): void
    {
        if (!is_int($money)){
            throw new InvalidArgumentException(sprintf('"%s" is not a valid money object',$money));
        }
        
        if($money < 0){
            throw new InvalidArgumentException(sprintf('"%s" cannot be negative',$money));
        }
    }

    public static function fromMoney($money): self
    {
        return new self($money);
    }

    public function getMoneyValue()
    {
        return $this->money;
    }

}


?>