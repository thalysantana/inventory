<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryPostRequest;
use App\Services\InventoryService;
use Illuminate\Http\Response;

/**
 * Class InventoryController
 *
 * @author Thalys Santana
 * @since 15th December 2020
 */
class InventoryController extends Controller
{
    /**
     * Inventory service
     *
     * @var InventoryService $inventoryService
     */
    private InventoryService $inventoryService;

    /**
     * Create a new InventoryController
     *
     * @param InventoryService $inventoryService
     */
    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    /**
     * Normally it would store a newly created inventory registry, but for this exercise, just responds
     * with the total price calculated for all items in the application.
     *
     * @param  InventoryPostRequest  $request
     * @return Response
     */
    public function store(InventoryPostRequest $request): Response
    {
        // Check the correct cost price for quantity specified in the application
        $applicationItems = $this->inventoryService->getCostPrice($request->quantity);

        // Calculate the total price for quantity specified
        $applicationTotalPrice = $this->inventoryService->calculateApplicationTotalPrice($applicationItems);

        // Return total price
        return new Response(compact('applicationTotalPrice'));
    }
}
