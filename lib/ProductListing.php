<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 6/2/18 1:38 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/sales_channels/productlisting Shoplazza API Reference for Shipping Zone
 */

namespace PHPShoplazza;


class ProductListing extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'product_listing';

    /**
     * @inheritDoc
     */
    protected $customGetActions = array (
        'product_ids' => 'productIds',
    );
}