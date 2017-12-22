<?php


/**
 * Class Asserter
 * @author Roman Senchuk frspm.roman@gmail.com
 */
class Asserter
{
    /**
     * @param string $expression
     * @return float
     */
    public function prsExpression(string &$expression): ?float
    {
        $leftOp = $this->prsFactor($expression);

        if ('' == $expression) {
            return $leftOp;
        }

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
     * @return float
     */
    public function prsFactor(string &$factor): ?float
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

            return $leftOp / $this->prsFactor($factor);
        }

        return $leftOp;
    }

    /**
     * @param string $term
     * @return float
     */
    public function prsTerm(string &$term): ?float
    {
        $returnValue = 0;
        if ($term == '') {

            return $returnValue;
        }
        if (is_numeric($term[0])) {

            return $this->prsNumber($term);
        }
        if ($term[0] === '(') {
            $term = substr($term, 1);
            $returnValue = $this->prsExpression($term);
            $term = substr($term, 1);

            return $returnValue;
        }
        if ($term[0] === ')') {
            $term = substr($term, 1);
        }

        return $returnValue;
    }

    /**
     * @param string $number
     * @return float
     */
    public function prsNumber(string &$number): ?float
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

        return (float)$numberTemp;
    }
}