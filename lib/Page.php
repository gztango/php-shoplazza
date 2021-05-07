<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/17/16 10:39 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/page Shoplazza API Reference for Page
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Page -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 * @property-read Metafield $Metafield
 *
 * @method Event Event(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 *
 */
class Page extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'page';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Event',
        'Metafield',
    );
}