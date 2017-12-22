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

    public function parseFactor($factor): ?int
    {
        $op = $this->parseTerm($factor);
    }

    public function parseTerm($term): ?int
    {
        $returnValue = 0;
    }

    public function parseNumber($number): ?int
    {

    }
}