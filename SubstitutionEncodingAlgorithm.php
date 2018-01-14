<?php

/**
 * Class SubstitutionEncodingAlgorithm
 */
class SubstitutionEncodingAlgorithm implements EncodingAlgorithm
{
    /**
     * @var array
     */
    private $substitutions;

    /**
     * SubstitutionEncodingAlgorithm constructor.
     * @param $substitutions
     */
    public function __construct(array $substitutions)
    {
        $this->substitutions = array();
    }

    /**
     * Encodes text by substituting character with another one provided in the pair.
     * For example pair "ab" defines all "a" chars will be replaced with "b" and all "b" chars will be replaced with "a"
     * Examples:
     *      substitutions = ["ab"], input = "aabbcc", output = "bbaacc"
     *      substitutions = ["ab", "cd"], input = "adam", output = "bcbm"
     *
     * @param string $text
     * @return string
     */
    public function encode($text)
    {
        $swapA = array();
        $swapB = array();
        $output = '';
        $aText = str_split($text);
        foreach($this->substitutions as $sub)
        {
            $swapA[] = substr($sub,0,1);
            $swapB[] = substr($sub,1,1);

        }

        foreach ($aText as $letter) {
            if (in_array(strtolower($letter, $swapA)) {
                $positionOccurence = array_search ($letter, $swapA);
                $replaced = $swapB[$positionOccurence];
                $output .= str_replace($letter, $replaced, $letter);
            } elseif (in_array(strtolower($letter), $swapB)) {
                $positionOccurence = array_search ($letter, $swapB);
                $replaced = $swapA[$positionOccurence];
                $output .= str_replace($letter, $replaced, $letter);
            } else {
                $output .= $letter;
            }
        }

        return $output;

        return '';
    }
}