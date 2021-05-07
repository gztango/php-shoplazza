<?php
/**
 * Created by PhpStorm.
 * @author Thomas Hondema <thomashondema@live.com>
 * Created at 8/14/19 18:28 PM UTC+02:00
 *
 * @see https://docs.shoplazza.com/api/reference/draftorder Shoplazza API Reference for DraftOrder
 */

namespace PHPShoplazza;



/**
 * --------------------------------------------------------------------------
 * DraftOrder -> Custom actions
 * --------------------------------------------------------------------------
 * @method array send_invoice()     Send the invoice for a DraftOrder
 * @method array complete()         Complete a DraftOrder
 *
 */
class DraftOrder extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'draft_order';

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'send_invoice',
    );

    /**
     * @inheritDoc
     */
    protected $customPutActions = array(
        'complete',
    );
}