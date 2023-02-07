<?php
class OrderPrices {
    public function __construct() {
    }
    
    public static function getCandlePrice($candle_size) {
        $price = 0;
        switch ($candle_size) {
            case 'small':
                $price = 5.99;
                break;
            case 'medium':
                $price = 7.99;
                break;
            case 'large':
                $price = 9.99;
                break;
        }
        return $price;
    }
    
    public static function getGiftWrapPrice() {
        return 2.50;
    }
    
    public static function getShippingCost($shipping_type) {
        $cost = 0;
        switch ($shipping_type) {
            case 'free':
                $cost = 0.00;
                break;
            case 'standard':
                $cost = 3.50;
                break;
            case 'expedited':
                $cost = 5.99;
                break;
            case 'one_day':
                $cost = 8.99;
                break;
        }
        return $cost;
    }
    
    public static function getTaxRate() {
        return 0.075;
    }
}