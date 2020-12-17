<?php
namespace App\Services;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class InventoryService
 *
 * @author Thalys Santanathe quantity to be applied exceeds the quantity on hand.

 * @since 15th December 2020
 */
class InventoryService
{
    /**
     * List of purchases that have items that can be used for new applications
     *
     * @var Collection $purchasesWithRemainingBalance
     */
    private Collection $purchasesWithRemainingBalance;

    /**
     * Create a new InventoryService
     *
     * @param Inventory $model
     */
    public function __construct(Inventory $model)
    {
        $this->model = $model;
        $this->loadPurchasesWithRemainingBalance();
    }

    /**
     * Load registers of purchases that are still available in stock
     *
     * @return void
     */
    private function loadPurchasesWithRemainingBalance(): void
    {
        $this->purchasesWithRemainingBalance = new Collection();

        $purchases = $this->getPurchases();
        $previousApplicationsTotal = $this->getPreviousApplicationsTotal();

        foreach ($purchases as $purchase) {
            if ($previousApplicationsTotal < 0) {
                $previousApplicationsTotal = $previousApplicationsTotal + $purchase->quantity;
                if($previousApplicationsTotal > 0) {
                    $purchase->quantity = $previousApplicationsTotal;
                    $this->purchasesWithRemainingBalance->push($purchase);
                }
            } else {
                $this->purchasesWithRemainingBalance->push($purchase);
            }
        }
    }

    /**
     * Get the total quantity of all previous applications
     *
     * @return float
     */
    public function getPreviousApplicationsTotal(): float
    {
        return Inventory::all()
            ->where('type', 'Application')
            ->sum('quantity');
    }

    /**
     * Get a list of all purchases
     *
     * @return Collection
     */
    public function getPurchases(): Collection
    {
        return Inventory::all()
            ->where('type', 'Purchase')
            ->sortBy('date');
    }

    /**
     * Get cost price for the quantity specified in the application and return a list of quantities and prices
     *
     * @param int $quantity
     *
     * @return Collection
     */
    public function getCostPrice(int $quantity): Collection
    {
        $remainingQuantity = $quantity;
        $applicationItems = new Collection();

        // Iterate over purchases to check the correct price according to the remaining balance of each purchase
        foreach ($this->purchasesWithRemainingBalance as $purchase) {
            $quantityFulfilledByCurrentPurchase = ($purchase->quantity > $remainingQuantity ? $remainingQuantity : $purchase->quantity);
            $remainingQuantity = $remainingQuantity - $quantityFulfilledByCurrentPurchase;

            $applicationItems->push(['quantity' => $quantityFulfilledByCurrentPurchase, 'unit_price' => $purchase->unit_price]);

            if ($remainingQuantity <= 0) {
                break;
            }
        }

        return $applicationItems;
    }

    /**
     * Calculate the total price for all items in the application
     *
     * @param Collection $inventoryTransactions
     *
     * @return float
     */
    public function calculateApplicationTotalPrice(Collection $inventoryTransactions): float
    {
        return $inventoryTransactions->map(function($item, $key) {
            return $item['quantity'] * $item['unit_price'];
        })->sum();
    }
}
