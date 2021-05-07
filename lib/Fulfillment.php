<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 3:04 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/fulfillment Shoplazza API Reference for Fulfillment
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Fulfillment -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 *
 * @method Event Event(integer $id = null)
 *
 * --------------------------------------------------------------------------
 * Fulfillment -> Custom actions
 * --------------------------------------------------------------------------
 * @method array complete()     Complete a fulfillment
 * @method array open()         Open a pending fulfillment
 * @method array cancel()       Cancel a fulfillment
 *
 */
class Fulfillment extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'fulfillment';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'FulfillmentEvent' => 'Event',
    );

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'complete',
        'open',
        'cancel',
    );
}