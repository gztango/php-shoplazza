<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 2:28 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/discount Shoplazza API Reference for Discount
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Discount -> Custom actions
 * --------------------------------------------------------------------------
 * @method array enable()       Enable a discount
 * @method array disable()      Disable a discount
 *
 */
class Discount extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'discount';

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'enable',
        'disable',
    );
}