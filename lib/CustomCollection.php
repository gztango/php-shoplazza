<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 11:46 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/customcollection Shoplazza API Reference for CustomCollection
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * CustomCollection -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 * @property-read Metafield $Metafield
 *
 * @method Event Event(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 *
 */
class CustomCollection extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'custom_collection';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Event',
        'Metafield',
    );
}