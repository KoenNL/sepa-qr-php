<?php
namespace SepaQr;

class StringEncoder
{

    /**
     * @param array $array
     * @return string
     */
    public function encode(array $array): string
    {
        return implode("\n", $array);
    }
}
