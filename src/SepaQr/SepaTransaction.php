<?php
namespace SepaQr;

class SepaTransaction
{

    private $serviceTag = 'BCD';
    private $version;
    private $characterSet;
    private $identification = 'SCT';
    private $bic;
    private $name;
    private $iban;
    private $amount;
    private $purpose;
    private $remittance;
    // @todo what is this?
    private $information;

    /**
     * @param string $version
     * @param int $characterSet
     * @param Bic $bic
     * @param string $name
     * @param Iban $iban
     * @param Money $amount
     * @param string $purpose
     * @param Remittance|null $remittance
     * @param string|null $information
     */
    public function __construct(
        // @todo validate if version is either 1 or 2
        string $version,
        int $characterSet,
        // @todo BIC can be null when version is 2
        Bic $bic,
        string $name,
        Iban $iban,
        Money $amount,
        string $purpose,
        ?Remittance $remittance = null,
        ?string $information = null
    ) {
        $this->version = $version;
        $this->characterSet = $characterSet;
        $this->bic = $bic;
        $this->name = $name;
        $this->iban = $iban;
        $this->amount = $amount;
        $this->purpose = $purpose;
        $this->remittance = $remittance;
        $this->information = $information;
    }

    /**
     * @return string
     */
    public function getServiceTag(): string
    {
        return $this->serviceTag;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getCharacterSet(): int
    {
        return $this->characterSet;
    }

    /**
     * @return string
     */
    public function getIdentification(): string
    {
        return $this->identification;
    }

    /**
     * @return Bic
     */
    public function getBic(): Bic
    {
        return $this->bic;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Iban
     */
    public function getIban(): Iban
    {
        return $this->iban;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * @return Remittance|null
     */
    public function getRemittance(): ?Remittance
    {
        return $this->remittance;
    }

    /**
     * @return string|null
     */
    public function getInformation(): ?string
    {
        return $this->information;
    }
}
