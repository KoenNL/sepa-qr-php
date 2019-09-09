<?php
namespace SepaQr;

use SepaQr\Exception\InvalidValueException;
use SepaQr\Validator\SepaTransactionValidator;

class SepaQrWriter extends QrCode
{

    private $sepaTransaction;
    private $sepaTransactionValidator;
    private $sepaTransactionNormalizer;
    private $stringEncoder;

    /**
     * @param SepaTransaction $sepaTransaction
     * @param SepaTransactionValidator $sepaTransactionValidator
     * @param SepaTransactionNormalizer $sepaTransactionNormalizer
     * @param StringEncoder $stringEncoder
     */
    public function __construct(
        SepaTransaction $sepaTransaction,
        SepaTransactionValidator $sepaTransactionValidator,
        SepaTransactionNormalizer $sepaTransactionNormalizer,
        StringEncoder $stringEncoder
    ) {
        $this->sepaTransaction = $sepaTransaction;
        $this->sepaTransactionValidator = $sepaTransactionValidator;
        $this->sepaTransactionNormalizer = $sepaTransactionNormalizer;
        $this->stringEncoder = $stringEncoder;
    }

    /**
     * @return SepaQrWriter
     * @throws InvalidValueException
     */
    public function buildQrCode(): self
    {
        if (!$this->sepaTransactionValidator->validate($this->sepaTransaction)) {
            throw new InvalidValueException('The SEPA transaction has invalid values');
        }

        $this->setText(
            $this->stringEncoder->encode(
                $this->sepaTransactionNormalizer->normalize(
                    $this->sepaTransaction)
            )
        );

        return $this;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->sepaTransactionValidator->getErrors();
    }
}
