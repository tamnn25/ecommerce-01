<?php

namespace App\Utils;

use Illuminate\Support\Str;

class CommonUtil
{
    /**
     * Method Generate a Unique String
     * 
     * @return string
     */
    public static function generateUUID()
    {
        return (string) Str::orderedUuid();
    }

    /**
     * Method Show Data
     * 
     * @param string|array $data
     * 
     * @return mixed
     */
    public static function dumpData($data)
    {
        echo '<pre>';
        print_r($data);
    }

    /**
     * Method Remove Character Special of Price
     * 
     * @param string $price
     * @param string $currency
     * 
     * @return string
     */
    public static function removeCharSpecPrice($price, $currency = 'VNĐ')
    {
        // Check Parameter
        if (empty($price))
            return null;

        // Check Parameter OK
        $price = preg_replace('/' . $currency . ' /', '', $price);
        $price = preg_replace('/ ' . $currency . '/', '', $price);
        $price = preg_replace('/\,/', '', $price);

        // Return
        return $price;
    }

    /**
     * Method Get Order Status Name.
     * 
     * @param int $status
     * 
     * @return string
     */
    public static function getOrderStatusName($status)
    {
        // Define Variable
        $statusName = null;

        // Process value of STATUS
        switch($status) {
            case 0:
                $statusName = trans('message.status_payment_unpaid');
                break;
            case 1:
                $statusName = trans('message.status_payment_online');
                break;
            case 2:
                $statusName = trans('message.status_shipper_doing');
                break;
            case 3:
                $statusName = trans('message.status_cancel');
                break;
            case 4:
                $statusName = trans('message.status_complete');
                break;
            default:
                break;
        }

        // Return
        return $statusName;
    }

    public static function formatMoney($value)
    {
        // Format value and Return
        return number_format($value, 2) . ' ' . trans('message.currency');
    }
}
