<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 10:42 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/shop Shoplazza API Reference for Shop
 */

namespace PHPShoplazza;


class Shop extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'shop';

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
        //Only one shop object for each store. So no pluralize
        return 'shop';
    }
}