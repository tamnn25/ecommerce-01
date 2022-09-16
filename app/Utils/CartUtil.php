<?php

namespace App\Utils;

use Illuminate\Support\Facades\Log;

class CartUtil
{
    /**
     * Function Update Quantity.
     * 
     * @param array $carts
     * @param integer $productId
     * @param integer $quantity
     * 
     * @return array
     */
    public static function updateQuantity($carts, $productId, $quantity)
    {
        // Convert $carts from array to collection
        $carts = collect($carts)->map(function ($cart) use ($productId, $quantity) {
            if ($cart['product_id'] == $productId) {
                // Update value for attribute quantity
                $cart['quantity'] = $quantity;
            }

            // Return
            return $cart;
        });

        // Convert data from collection to array
        $carts = $carts->toArray();

        // Return
        return $carts;        
    }

    /**
     * Function Calculate Summary.
     * 
     * @param array $carts
     * 
     * @return array
     */
    public static function calcalateSummary($carts)
    {
        // Create Collection
        $collectCart = collect($carts);

        Log::info(json_encode($collectCart));

        // Calculate for Total Quantity
        $totalQuantity = $collectCart->sum('quantity');

        // Calculate for Total Money
        $totalMoney = $collectCart->sum(function ($cart) {
            return $cart['quantity'] * $cart['price'];
        });

        // Return
        return [
            'total_quantity' => $totalQuantity,
            'total_money' => $totalMoney,
        ];
    }
}
