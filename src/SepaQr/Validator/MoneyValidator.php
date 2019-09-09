<?php
namespace SepaQr\Validator;

use SepaQr\Money;

class MoneyValidator
{

    const MAX_AMOUNT = 99999999999;

    /**
     * @param Money $money
     * @return bool
     */
    public function validate(Money $money): bool
    {
        return $money->getCents() > 0 && $money->getCents() < self::MAX_AMOUNT;
    }
}
