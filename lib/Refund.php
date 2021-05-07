<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 7:19 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/refund Shoplazza API Reference for Refund
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Refund -> Custom actions
 * --------------------------------------------------------------------------
 * @method array calculate(array $calculation = null)      Calculate a Refund.
 *
 */
class Refund extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'refund';

    /**
     * @inheritDoc
     */
    protected $customPostActions = array (
        'calculate',
    );
}
