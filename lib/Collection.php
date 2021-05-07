<?php

namespace PHPShoplazza;

/**
 * --------------------------------------------------------------------------
 * Collection -> Child Resources
 * --------------------------------------------------------------------------
 *
 * @property-read Product $Product
 *
 * @method Product Product(integer $id = null)
 *
 * @see https://shoplazza.dev/docs/admin-api/rest/reference/products/collection
 *
 */
class Collection extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $readOnly = false;

    /**
     * @inheritDoc
     */
    protected $resourceKey = 'collection';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Product',
    );
}