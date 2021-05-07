<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/9/16 12:28 PM UTC+06:00
 */

namespace PHPShoplazza;

class TestResource extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ShoplazzaSDK $shoplazza;
     */
    public static $shoplazza;

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass()
    {
        $config = array(
            'ShopUrl' => getenv('SHOPIFY_SHOP_URL'), //Your shop URL
            'ApiKey' => getenv('SHOPIFY_API_KEY'), //Your Private API Key
            'Password' => getenv('SHOPIFY_API_PASSWORD'), //Your Private API Password
        );

        self::$shoplazza = ShoplazzaSDK::config($config);
        ShoplazzaSDK::checkApiCallLimit();
    }

    /**
     * @inheritDoc
     */
    public static function tearDownAfterClass()
    {
        self::$shoplazza = null;
    }
}