<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 1:50 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/product_variant Shoplazza API Reference for Product Variant
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * ProductVariant -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Metafield $Metafield
 *
 * @method Metafield Metafield(integer $id = null)
 *
 */
class ProductVariant extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'variant';

    /**
     * @inheritDoc
     */
    public $searchEnabled = true;

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Metafield',
    );
}