<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 5:47 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/location Shoplazza API Reference for Location
 */

namespace PHPShoplazza;


class Location extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'location';

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
    protected $childResource = array(
        'InventoryLevel',
    );
}