<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 3:18 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/article Shoplazza API Reference for Article
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * Article -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 * @property-read Metafield $Metafield
 *
 * @method Event Event(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 *
 */
class Article extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'article';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Event',
        'Metafield',
    );
}