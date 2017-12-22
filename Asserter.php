<?php


/**
 * Class Asserter
 * @author Roman Senchuk frspm.roman@gmail.com
 */
class Asserter
{
    /**
     * @param string $expression
     * @return int
     */
    public function parseExpr(string $expression): ?int
    {
        $op = $this->parseFactor($expression);
    }

    /**
     * @param string $factor
     * @return int|null
     */
    public function parseFactor(string &$factor): ?int
    {
        $op = $this->parseTerm($factor);
        if ('' == $factor) {
            return $op;
        }

        if ($factor[0] == '*') {
            $factor = substr($factor, 1);

            return $op * $this->parseFactor($factor);
        }
        if ($factor[0] == '/') {
            $factor = substr($factor, 1);

            return $op * $this->parseFactor($factor);
        }

        return $op;
    }

    /**
     * @param string $term
     * @return int
     */
    public function parseTerm(string &$term): ?int
    {
        $returnValue = 0;
        if (strlen($term) == $returnValue) {

            return $returnValue;
        }
        if (is_numeric($term[0])) {

            return $this->parseNumber($term);
        }
        if ($term[0] === '(') {
            $term = substr($term, 1);

            return $this->parseExpr($term);
        }
        if ($term[0] === ')') {
            $term = substr($term, 1);
        }

        return $returnValue;
    }

    /**
     * @param string $number
     * @return int|null
     */
    public function parseNumber(string &$number): ?int
    {
        $numberTemp = '';
        while (strlen($number) > 0) {
            $char = $number[0];
            if (!is_numeric($char)) {
                break;
            }
            $numberTemp .= $char;
            $trimmedStr = substr($number, 1);
            if (!is_string($trimmedStr)) {
                break;
            }
            $number = $trimmedStr;

        }

        return (int)$numberTemp;
    }
}