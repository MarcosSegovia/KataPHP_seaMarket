<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 12/7/15
 * Time: 17:30
 */

require_once dirname('__ROOT__') . '/src/SeaMarket.php';

class SeaMarketTest extends \PHPUnit_Framework_TestCase
{
    private $seaMarket;

    function setUp()
    {
        $this->seaMarket = new SeaMarket();
    }

    function testGetBiggerNumber()
    {
        $this->assertEquals(7, $this->seaMarket->retrieveBiggerNumber(2,3,7));
    }

    function testGetCostByKilometer()
    {
        $this->assertEquals(2*400, $this->seaMarket->retrieveMoneyPerTotalKilometer(400));
    }

    function testGetTotalCostChargingVanPlusRoadPerDistance()
    {
        $this->assertEquals(5+(2*400), $this->seaMarket->retrieveMoneyChargingVanPlusRoadDistance(400));
    }

    function testGetDistanceByLocationName()
    {
        $this->assertEquals(800, $this->seaMarket->getDistanceByLocationName('Madrid'));
        $this->assertEquals(1100, $this->seaMarket->getDistanceByLocationName('Barcelona'));
        $this->assertEquals(600, $this->seaMarket->getDistanceByLocationName('Lisboa'));
    }

    function testGetProductValueByCity()
    {
        $this->assertEquals(50*500, $this->seaMarket->getProductValueByCity(50, 'vieira', 'Madrid'));
        $this->assertEquals(0, $this->seaMarket->getProductValueByCity(50, 'centollo', 'Barcelona'));
        $this->assertEquals(10000, $this->seaMarket->getProductValueByCity(100, 'pulpo', 'Lisboa'));
    }

    function testDepreciationPerKm()
    {
        $this->assertEquals(50*500 - 50*500*0.05, $this->seaMarket->calculateDepreciation(50*500, 500));
    }

    function testGetFinalValueByLocation()
    {
        $products = array('vieira' => 50, 'pulpo' => 100, 'centollo' => 50);
        $this->assertEquals($this->seaMarket->getFinalValueByLocation($products, 'Madrid'), $this->seaMarket->getFinalValueByLocation($products, 'Madrid'));
        $this->assertEquals($this->seaMarket->getFinalValueByLocation($products, 'Barcelona'), $this->seaMarket->getFinalValueByLocation($products, 'Barcelona'));
        $this->assertEquals($this->seaMarket->getFinalValueByLocation($products, 'Lisboa'), $this->seaMarket->getFinalValueByLocation($products, 'Lisboa'));
    }

}
 