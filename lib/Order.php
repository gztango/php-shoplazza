<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 2:59 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/order Shoplazza API Reference for Order
 */

namespace PHPShoplazza;



/**
 * --------------------------------------------------------------------------
 * Order -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Fulfillment $Fulfillment
 * @property-read OrderRisk $Risk
 * @property-read Refund $Refund
 * @property-read Transaction $Transaction
 * @property-read Event $Event
 * @property-read Metafield $Metafield
 *
 * @method Fulfillment Fulfillment(integer $id = null)
 * @method OrderRisk Risk(integer $id = null)
 * @method Refund Refund(integer $id = null)
 * @method Transaction Transaction(integer $id = null)
 * @method Event Event(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 *
 * --------------------------------------------------------------------------
 * Order -> Custom actions
 * --------------------------------------------------------------------------
 * @method array close()     Close an Order
 * @method array open()         Re-open a closed Order
 * @method array cancel(array $data)  Cancel an Order
 *
 */
class Order extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'order';

    /**
     * @inheritDoc
     */
    protected $childResource = array (
        'Fulfillment',
        'OrderRisk' => 'Risk',
        'Refund',
        'Transaction',
        'Event',
        'Metafield',
    );

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'close',
        'open',
        'cancel',
    );
}