<?php
namespace SepaQr;

class Money
{

    private $cents;

    /**
     * @param $cents
     */
    public function __construct(int $cents)
    {
        $this->cents = $cents;
    }

    /**
     * @return int
     */
    public function getCents(): int
    {
        return $this->cents;
    }

    /**
     * @return string
     */
    public function toEuros(): string
    {
        return sprintf('EUR%s', number_format(floatval($this->cents / 100), 2, '.', ''));
    }

}