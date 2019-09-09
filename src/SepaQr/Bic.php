<?php
namespace SepaQr;

class Bic
{

    private $bic;

    /**
     * @param string $bic
     */
    public function __construct(string$bic)
    {
        $this->bic = $bic;
    }

    /**
     * @return string
     */
    public function getBic(): string
    {
        return $this->bic;
    }
}
