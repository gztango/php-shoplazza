<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 1:35 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/product_image Shoplazza API Reference for Product Image
 */

namespace PHPShoplazza;


class ProductImage extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'image';
}