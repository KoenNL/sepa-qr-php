<?php
namespace SepaQr\Validator;

use SepaQr\Bic;

class BicValidator
{

    private $pattern = '^[A-Z0-9]{8,11}$';

    /**
     * @param Bic $bic
     * @return bool
     */
    public function validate(Bic $bic): bool
    {
        return preg_match($this->pattern, $bic);
    }
}
