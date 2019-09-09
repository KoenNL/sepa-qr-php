<?php

use SepaQr\Bic;
use SepaQr\Exception\InvalidValueException;
use SepaQr\Iban;
use SepaQr\Money;
use SepaQr\Remittance;
use SepaQr\SepaQrFactory;
use SepaQr\SepaTransaction;

try {
    $sepaQrWriter = SepaQrFactory::getWriter(
        new SepaTransaction(
            2,
            1,
            new Bic('TESTBIC'),
            'test name',
            new Iban('NL00BANK1234567890'),
            new Money(12300),
            'new coat',
            new Remittance('Dont know', 'DLBB'),
            'Some random info.'
        )
    );
} catch (InvalidValueException $exception) {
    var_dump($sepaQrWriter->getErrors());
}

header('Content-Type: ' . $sepaQrWriter->getContentType());
echo $sepaQrWriter->writeString();