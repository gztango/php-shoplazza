<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 10:46 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/product Shoplazza API Reference for Product
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Product -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read ProductImage $Image
 * @property-read ProductVariant $Variant
 * @property-read Metafield $Metafield
 * @property-read Event $Event
 *
 * @method ProductImage Image(integer $id = null)
 * @method ProductVariant Variant(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 * @method Event Event(integer $id = null)
 *
 */
class Product extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'product';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'ProductImage' => 'Image',
        'ProductVariant' => 'Variant',
        'Metafield',
        'Event'
    );
}