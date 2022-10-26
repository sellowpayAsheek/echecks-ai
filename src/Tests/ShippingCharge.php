<?php

namespace Echeck\Tests ;

class ShippingCharge
{
    public static $shipping_type ;
    public $first_class_charge = 1.0 ;
    
    const AVAILABLESHIPPINGTYPES = [
        1,2,3,4,5
    ];

    public function getShippingCharge($items)
    {   
        $charge = $this->getShippingChargeAccordingToType();
        return $charge * $items ;
    }

    public function getShippingChargeAccordingToType()
    {   
        switch(self::$shipping_type){
            case 1 : $charge = 1.0 ; break ;
            case 2 : $charge = 3.0 ; break ;
            case 3 : $charge = 9.0 ; break ;
            case 4 : $charge = 21.0 ; break ;
            case 5 ; $charge = 30.0 ; break ;
            default : $charge = 1.0 ;
        }
        return $charge ;
    }
}