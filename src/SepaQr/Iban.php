<?php
namespace SepaQr;

class Iban
{

    private $iban;

    /**
     * @param string $iban
     */
    public function __construct(string $iban)
    {
        $this->iban = $iban;
    }

    /**
     * @return string
     */
    public function getIban(): string
    {
        return $this->iban;
    }

}
