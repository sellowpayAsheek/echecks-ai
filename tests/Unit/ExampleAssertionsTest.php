<?php

use PHPUnit\Framework\TestCase;

class ExampleAssertionsTest extends TestCase 
{
    public function testStringMatches()
    {
        $string1 = "testing" ;
        $string2 = "testing" ;
        $string3 = "Testing" ;
        $this->assertSame($string1,$string2);
        // $this->assertSame($string1,$string3);
    }

    public function testAddTwoNumber()
    {
        $n1 = 5 ;
        $n2 = 10 ;
        $this->assertEquals($n1,$n2);
    }
}