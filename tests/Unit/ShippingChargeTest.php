<?php

use Echeck\Tests\ShippingCharge;
use PHPUnit\Framework\TestCase;

class ShippingChargeTest extends TestCase 
{
    public function testShippingCharge()
    {
        $shipping = new ShippingCharge();
        $shipping_charge = $shipping->getShippingCharge(5) ;
        $this->assertEquals(5,$shipping_charge);
    }

    public function testShippingChargeStatically()
    {      
        $type = 2 ;
        $this->assertNotEmpty($type);
        $this->assertContains($type,ShippingCharge::AVAILABLESHIPPINGTYPES,"Shipping type not found");

        ShippingCharge::$shipping_type = $type ;
        $shipping = new ShippingCharge();
       
        $shipping_charge = $shipping->getShippingCharge(5) ;

        $this->assertStringMatchesFormat('adr_%s',"address");
        $this->assertEquals(15,$shipping_charge);
        $this->assertIsFloat($shipping_charge);
    }
}