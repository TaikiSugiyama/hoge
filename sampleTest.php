<?php

class sampleTest extends PHPUnit_Framework_TestCase
{   
    function test_sample()
    {
        $val1 = 3 * 6;
        $val2 = 2 * 9;
        $bool = $val1 === $val2;

        $this->assertTrue($bool);
    }
}


