<?php

namespace Tests\Unit;

use App\Models\Inventory;
use App\Services\InventoryService;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;
use Mockery;

class InventoryServiceTest extends TestCase
{

    public function providerCalculateApplicationTotalPrice()
    {
        return [
            [
                new Collection([
                    ['quantity' => 5, 'unit_price' => 10],
                    ['quantity' => 5, 'unit_price' => 5],
                ]),
                75,
            ],
            [
                new Collection([
                    ['quantity' => 1, 'unit_price' => 7.5],
                    ['quantity' => 10, 'unit_price' => 5],
                    ['quantity' => 5, 'unit_price' => 2.5],
                ]),
                70,
            ],
        ];
    }

    /**
     * Asserts the calculated total price is correct
     *
     * @covers \App\Services\InventoryService::calculateApplicationTotalPrice
     * @dataProvider providerCalculateApplicationTotalPrice
     *
     * @return void
     */
    public function testCalculateApplicationTotalPrice($items, $totalAmount)
    {
        $service = Mockery::mock(InventoryService::class)->makePartial();
        $result = $service->calculateApplicationTotalPrice($items);

        $this->assertEquals($totalAmount, $result);
    }


    /**
     * Assert that get purchases returns a collection
     *
     * @covers \App\Services\InventoryService::getPurchases

     * @runInSeparateProcess
     * @preserveGlobalState disabled
     *
     * @return void
     */
    public function testGetPurchases()
    {
        $collection = Mockery::mock(Collection::class);
        $collection->shouldReceive('where')
            ->once()
            ->andReturnSelf();
        $collection->shouldReceive('sortBy')
            ->once()
            ->andReturnSelf();

        $model = Mockery::mock('overload:' .Inventory::class)->makePartial();
        $model->shouldReceive('all')
            ->once()
            ->andReturn($collection);

        $service = Mockery::mock(InventoryService::class)->makePartial();
        $result = $service->getPurchases();

        $this->assertInstanceOf(Collection::class, $result);
    }
}
