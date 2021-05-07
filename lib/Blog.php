<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/18/16 10:46 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/blog Shoplazza API Reference for Blog
 */

namespace PHPShoplazza;

/**
 * --------------------------------------------------------------------------
 * Blog -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Article $Article
 * @property-read Event $Event
 * @property-read Metafield $Metafield
 *
 * @method Article Article(integer $id = null)
 * @method Event Event(integer $id = null)
 * @method Metafield Metafield(integer $id = null)
 *
 */
class Blog extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    public $resourceKey = 'blog';

    /**
     * @inheritDoc
     */
    protected $childResource = array(
        'Article',
        'Event',
        'Metafield',
    );
}