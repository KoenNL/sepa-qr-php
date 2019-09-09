<?php
namespace SepaQr;

class Remittance
{

    private $text;
    private $reference;

    /**
     * @param string $text
     * @param string $reference
     */
    public function __construct(string $text, string $reference)
    {
        $this->text = $text;
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

}
