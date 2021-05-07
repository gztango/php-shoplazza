<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 7:40 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/smartcollection Shoplazza API Reference for SmartCollection
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * SmartCollection -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 *
 * @method Event Event(integer $id = null)
 *
 * --------------------------------------------------------------------------
 * SmartCollection -> Custom actions
 * --------------------------------------------------------------------------
 *
 */
class SmartCollection extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'smart_collection';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Event',
        'Metafield',
    );

    /**
     * Set the ordering type and/or the manual order of products in a smart collection
     *
     * @param array $params
     *
     * @return array
     */
    public function sortOrder($params)
    {
        $url = $this->generateUrl($params, 'order');

        return $this->put(array(), $url);
    }
}
