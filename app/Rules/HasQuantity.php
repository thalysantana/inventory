<?php

namespace App\Rules;

use App\Models\Inventory;
use App\Services\InventoryService;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class InventoryService
 *
 * Validate if there is enough quantity on inventory to fulfill the quantity submitted
 *
 * @author Thalys Santana
 * @since 15th December 2020
 */
class HasQuantity implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return Inventory::all()->sum('quantity') >= $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The quantity to be applied exceeds the quantity on hand.';
    }
}
