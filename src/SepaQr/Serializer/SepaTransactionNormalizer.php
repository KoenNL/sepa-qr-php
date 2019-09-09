<?php
namespace SepaQr;

class SepaTransactionNormalizer
{

    public function normalize(SepaTransaction $sepaTransaction): array
    {
        $normalizedSepaTransaction = [
            'serviceTag' => $sepaTransaction->getServiceTag(),
            'version' => $sepaTransaction->getVersion(),
            'characterSet' => $sepaTransaction->getCharacterSet(),
            'identification' => $sepaTransaction->getIdentification(),
            'bic' => $sepaTransaction->getBic()->getBic(),
            'name' => $sepaTransaction->getName(),
            'iban' => $sepaTransaction->getIban()->getIban(),
            'amount' => $sepaTransaction->getAmount()->toEuros(),
            'purpose' => $sepaTransaction->getPurpose(),
            'information' => $sepaTransaction->getInformation()
        ];

        if (!empty($sepaTransaction->getRemittance())) {
            $normalizedSepaTransaction['remittanceReference'] = $sepaTransaction->getRemittance()->getReference();
            $normalizedSepaTransaction['remittanceText'] = $sepaTransaction->getRemittance()->getText();
        }

        return $normalizedSepaTransaction;
    }
}
