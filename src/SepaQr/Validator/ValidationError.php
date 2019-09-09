<?php
namespace SepaQr\Validator;

class ValidationError
{

    private $field;
    private $value;

    /**
     * ValidationError constructor.
     * @param string $field
     * @param $value
     */
    public function __construct(string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
}