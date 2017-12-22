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
    public function prsExpression(string &$expression): ?int
    {
        $leftOp = $this->prsFactor($expression);

        if ($expression[0] == '+') {
            $expression = substr($expression, 1);

            return $leftOp + $this->prsExpression($expression);
        }

        if ($expression[0] == '-') {
            $expression = substr($expression, 1);

            return $leftOp - $this->prsExpression($expression);
        }

        return $leftOp;
    }

    /**
     * @param string $factor
     * @return int|null
     */
    public function prsFactor(string &$factor): ?int
    {
        $leftOp = $this->prsTerm($factor);
        if ('' == $factor) {
            return $leftOp;
        }

        if ($factor[0] == '*') {
            $factor = substr($factor, 1);

            return $leftOp * $this->prsFactor($factor);
        }
        if ($factor[0] == '/') {
            $factor = substr($factor, 1);

            return $leftOp * $this->prsFactor($factor);
        }

        return $leftOp;
    }

    /**
     * @param string $term
     * @return int
     */
    public function prsTerm(string &$term): ?int
    {
        $returnValue = 0;
        if (strlen($term) == $returnValue) {

            return $returnValue;
        }
        if (is_numeric($term[0])) {

            return $this->prsNumber($term);
        }
        if ($term[0] === '(') {
            $term = substr($term, 1);

            return $this->prsExpression($term);
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
    public function prsNumber(string &$number): ?int
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