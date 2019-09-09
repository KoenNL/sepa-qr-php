<?php
namespace SepaQr\Validator;

use SepaQr\Iban;

class IbanValidator
{

    private $pattern = '^[A-Z]{2}[0-9]{2}[A-Z]{4}[0-9]{10}$';

    /**
     * @param Iban $iban
     * @return bool
     */
    public function validate(Iban $iban): bool
    {
        return preg_match($this->pattern, $iban);
    }

}