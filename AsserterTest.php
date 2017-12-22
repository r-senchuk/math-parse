<?php

/*
 * Created by Roman Senchuk.
 * at 22.12.17 14:10
 */

require __DIR__ . '/vendor/autoload.php';
require 'Asserter.php';

/**
 * Class AsserterTest
 * @author Roman Senchuk frspm.roman@gmail.com
 */
class AsserterTest extends \PHPUnit\Framework\TestCase
{

    public const EXPRESSION = '200+12*((1/8)+1)-19';

    public function test()
    {
        $assert = new Asserter();
        $result = $assert->parseExpr(self::EXPRESSION);

        self::assertEquals(194.5, $result);
    }
}
