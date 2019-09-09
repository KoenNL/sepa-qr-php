<?php
namespace SepaQr\Validator;

use SepaQr\SepaTransaction;

class SepaTransactionValidator
{

    const LENGTH_NAME = 70;
    const LENGTH_INFORMATION = 70;
    const IDENTIFICATION = 'SCT';
    const SERVICE_TAG = 'BCD';

    private $ibanValidator;
    private $bicValidator;
    private $moneyValidator;
    private $remittanceValidator;
    private $errors = [];

    /**
     * @param IbanValidator $ibanValidator
     * @param BicValidator $bicValidator
     * @param MoneyValidator $moneyValidator
     * @param RemittanceValidator $remittanceValidator
     */
    public function __construct(
        IbanValidator $ibanValidator,
        BicValidator $bicValidator,
        MoneyValidator $moneyValidator,
        RemittanceValidator $remittanceValidator
    ) {
        $this->ibanValidator = $ibanValidator;
        $this->bicValidator = $bicValidator;
        $this->moneyValidator = $moneyValidator;
        $this->remittanceValidator = $remittanceValidator;
    }

    /**
     * @param SepaTransaction $sepaTransaction
     * @return bool
     */
    public function validate(SepaTransaction $sepaTransaction): bool
    {
        if (!$this->bicValidator->validate($sepaTransaction->getBic())) {
            $this->addError('BIC', $sepaTransaction->getBic());
        }

        if (!$this->ibanValidator->validate($sepaTransaction->getIban())) {
            $this->addError('IBAN', $sepaTransaction->getIban());
        }

        if (!$this->moneyValidator->validate($sepaTransaction->getAmount())) {
            $this->addError('amount', $sepaTransaction->getAmount());
        }

        if (!empty($sepaTransaction->getRemittance())
            && !$this->remittanceValidator->validate($sepaTransaction->getRemittance())) {
            $this->addError('remittance', $sepaTransaction->getRemittance());
        }

        if (strlen($sepaTransaction->getName()) > self::LENGTH_NAME) {
            $this->addError('name', $sepaTransaction->getName());
        }

        if (strlen($sepaTransaction->getInformation()) > self::LENGTH_INFORMATION) {
            $this->addError('information', $sepaTransaction->getInformation());
        }

        if ($sepaTransaction->getServiceTag() !== self::SERVICE_TAG) {
            $this->addError('serviceTag', $sepaTransaction->getServiceTag());
        }

        if ($sepaTransaction->getIdentification() !== self::IDENTIFICATION) {
            $this->addError('identification', $sepaTransaction->getIdentification());
        }

        if (count($this->errors) > 0) {
            return false;
        }

        return true;
    }

    /**
     * @param string $field
     * @param $value
     */
    private function addError(string $field, $value)
    {
        $this->errors[] = new ValidationError($field, $value);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

}