<?php
namespace SepaQr;

use SepaQr\Validator\BicValidator;
use SepaQr\Validator\IbanValidator;
use SepaQr\Validator\MoneyValidator;
use SepaQr\Validator\RemittanceValidator;
use SepaQr\Validator\SepaTransactionValidator;

class SepaQrFactory
{

    /**
     * @param SepaTransaction $sepaTransaction
     * @return SepaQrWriter
     * @throws Exception\InvalidValueException
     */
    public static function getWriter(SepaTransaction $sepaTransaction)
    {
        $sepaQrWriter = new SepaQrWriter(
            $sepaTransaction,
            new SepaTransactionValidator(
                new IbanValidator(),
                new BicValidator(),
                new MoneyValidator(),
                new RemittanceValidator()
            ),
            new SepaTransactionNormalizer(),
            new StringEncoder()
        );

        return $sepaQrWriter->buildQrCode();
    }
}