<?php

namespace Tests\Feature;

use Tests\TestCase;

class InventoryControllerTest extends TestCase
{

    /**
     * Data provider for store
     *
     * @return array
     */
    public function storeProvider(): array
    {
        return [
            [null, 422],
            [0, 422],
            [1, 200],
            [43, 200],
            [44, 422],
        ];
    }

    /**
     * Test expected results for different quantities
     *
     * @covers \App\Http\Controllers\InventoryController::store
     * @dataProvider storeProvider
     *
     * @return void
     */
    public function testStore($quantity, $status)
    {
        $response = $this->post('/api/inventory', ['quantity' => $quantity]);

        $response->assertStatus($status);
    }
}
