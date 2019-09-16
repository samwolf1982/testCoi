<?php

namespace App\Helpers;

class HtmlHelpers
{
    /**
     * @param int $user_id User-id
     *
     * @return string
     */
    public static function getActiveByCookieCode($code)
    {


        $currency_code = '';
        if (!empty($_COOKIE['currency_code'])) {
            $currency_code = $_COOKIE['currency_code'];
        };

        switch ($code) {
            case 'usd':
                if ($currency_code == $code) return '  btn-warning ';
                else return '';
                break;
            case 'eur':
                if ($currency_code == $code) return '  btn-warning ';
                else return '';
                break;
            case 'uah':
                if ($currency_code == $code || empty($currency_code)) return '  btn-warning ';
                else return '';
                break;
        }
    }

    public static function getActiveCurrencyCode()
    {


        $currency_code = '';
        if (!empty($_COOKIE['currency_code'])) {
            $currency_code = $_COOKIE['currency_code'];
        };

        switch ($currency_code) {
            case 'usd':
                return '$';
                break;
            case 'eur':
                return '€';
                break;
            case 'uah':
                return '₴';
                break;
            default:
                return '₴';
                break;
        }
    }
}
