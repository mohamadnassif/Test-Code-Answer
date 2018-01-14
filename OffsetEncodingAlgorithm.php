<?php

/**
 * Class OffsetEncodingAlgorithm
 */
class OffsetEncodingAlgorithm implements EncodingAlgorithm
{
    /**
     * Lookup string
     */
    const CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @var int
     */
    private $offset;

    /**
     * @param int $offset
     */
    public function __construct($offset = 13)
    {
        $this->offset = $offset;
    }

    /**
     * Encodes text by shifting each character (existing in the lookup string) by an offset (provided in the constructor)
     * Examples:
     *      offset = 1, input = "a", output = "b"
     *      offset = 2, input = "z", output = "B"
     *      offset = 1, input = "Z", output = "a"
     *
     * @param string $text
     * @return string
     */
    public function encode($text)
    {
        function encrypt($str, $offset) {
            $encrypted_text = "";
            $offset = $offset % 26;
            if($offset < 0) {
                $offset += 26;
            }
            $i = 0;
            while($i < strlen($str)) {
                $c = strtoupper($str{$i}); 
                if(($c >= "A") && ($c <= 'Z')) {
                    if((ord($c) + $offset) > ord("Z")) {
                        $encrypted_text .= chr(ord($c) + $offset - 26);
                } else {
                    $encrypted_text .= chr(ord($c) + $offset);
                }
              } else {
                  $encrypted_text .= " ";
              }
              $i++;
            }
            return $encrypted_text;
        }
      
    }
}