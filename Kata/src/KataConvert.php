<?php

namespace Acme;


final class KataConvert
{

    private $integerToConvert;

    public function __construct($integerToConvert)
    {
        $this->ensureIsValidNumber($integerToConvert);

        $this->integerToConvert = $integerToConvert;
    }


    private function ensureIsValidNumber($integerToConvert): void
    {
        if (!is_int($integerToConvert)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid value', $integerToConvert));
        }

        if ($integerToConvert < 0) {
            throw new \InvalidArgumentException(sprintf('"%s" cannot be negative', $integerToConvert));
        }
    }

    public function convertToRoman()
    {

        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );
        $integer= $this->integerToConvert;
        $result = '';
        while ($integer > 0) {
            foreach ($romans as $roman => $value) {
                if ($integer >= $value) {
                    $integer -= $value;
                    $result .= $roman;
                    break;
                }
            }
        }
        return $result;
    }
}

 /*
function numberToRomanRepresentation($integer) {
    $romans = array(
                'M' => 1000, 
                'CM' => 900, 
                'D' => 500, 
                'CD' => 400, 
                'C' => 100, 
                'XC' => 90, 
                'L' => 50, 
                'XL' => 40, 
                'X' => 10, 
                'IX' => 9, 
                'V' => 5, 
                'IV' => 4, 
                'I' => 1
            );
            
    $result = '';
    while ($integer > 0) {
        foreach ($romans as $roman => $value) {
            if($integer >= $value) {
                $integer -= $value;
                $result .= $roman;
                break;
            }
        }
    }
    return $result;
}

 echo numberToRomanRepresentation(10)."</br>";
 echo numberToRomanRepresentation(84)."</br>";
 echo numberToRomanRepresentation(25)."</br>";
 echo numberToRomanRepresentation(1684)."</br>";
 */
