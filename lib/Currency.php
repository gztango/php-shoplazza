<?php
/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 6/10/2019
 * Time: 11:22 PM
 *
 * @see https://docs.shoplazza.com/en/api/reference/store-properties/currency Shoplazza API Reference for Currency
 */

namespace PHPShoplazza;


class Currency extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'currency';

    /**
     * @inheritDoc
     */
    public $countEnabled = false;

    /**
     * @inheritDoc
     */
    public $readOnly = true;

    /**
     * @inheritDoc
     */
    public function pluralizeKey()
    {
        return 'currencies';
    }
}