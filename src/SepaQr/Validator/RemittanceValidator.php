<?php
namespace SepaQr\Validator;

use SepaQr\Remittance;

class RemittanceValidator
{

    const LENGTH_TEXT = 140;
    const LENGTH_REFERENCE = 35;

    public function validate(Remittance $remittance): bool
    {
        return strlen($remittance->getReference()) > 0
            && strlen($remittance->getReference()) < self::LENGTH_REFERENCE
            && strlen($remittance->getText()) > 0
            && strlen($remittance->getText()) < self::LENGTH_TEXT;
    }
}
