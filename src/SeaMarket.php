<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 12/7/15
 * Time: 17:25
 */


class SeaMarket
{
    function __construct()
    {

    }

    function retrieveBiggerNumber($num1, $num2, $num3)
    {
        return max(array($num1, $num2, $num3));
    }

    function retrieveMoneyPerTotalKilometer($kilometers)
    {
        return $kilometers*2;
    }

    function retrieveMoneyChargingVanPlusRoadDistance($kilometers)
    {
        return $this->retrieveMoneyPerTotalKilometer($kilometers)+5;
    }

    function getDistanceByLocationName($location)
    {
        if(strcmp($location, 'Madrid') == 0)
        {
            return 800;
        }

        if(strcmp($location, 'Barcelona') == 0)
        {
            return 1100;
        }

        if(strcmp($location, 'Lisboa') == 0)
        {
            return 600;
        }
    }

    function getProductValueByCity($quantity, $product, $location)
    {
        if(strcmp($location, 'Madrid') == 0)
        {
            if(strcmp($product, 'vieira') == 0)
            {
                return $quantity*500;
            }
            if(strcmp($product, 'pulpo') == 0)
            {
                return 0;
            }
            if(strcmp($product, 'centollo') == 0)
            {
                return $quantity*450;
            }
        }

        if(strcmp($location, 'Barcelona') == 0)
        {
            if(strcmp($product, 'vieira') == 0)
            {
                return $quantity*450;
            }
            if(strcmp($product, 'pulpo') == 0)
            {
                return $quantity*120;
            }
            if(strcmp($product, 'centollo') == 0)
            {
                return $quantity*0;
            }
        }

        if(strcmp($location, 'Lisboa') == 0)
        {
            if(strcmp($product, 'vieira') == 0)
            {
                return $quantity*600;
            }
            if(strcmp($product, 'pulpo') == 0)
            {
                return $quantity*100;
            }
            if(strcmp($product, 'centollo') == 0)
            {
                return $quantity*500;
            }
        }

    }

    function calculateDepreciation($productValue, $distance)
    {
        $percentage = $distance/100;

        return $productValue - ($productValue*($percentage/100));
    }

    function getFinalValueByLocation($products, $location)
    {
        $money = 0;

        foreach ($products as $key=>$value)
        {
            $money = $this->getProductValueByCity($value, $key, $location);
        }

        $distance = $this->getDistanceByLocationName($location);

        $money = $this->calculateDepreciation($money, $distance);
        $money = $money - $this->retrieveMoneyChargingVanPlusRoadDistance($distance);

        return $money;
    }
} 