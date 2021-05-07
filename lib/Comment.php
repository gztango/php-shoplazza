<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 10:58 AM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/comment Shoplazza API Reference for Comment
 */

namespace PHPShoplazza;


/**
 *
 * --------------------------------------------------------------------------
 * Comment -> Child Resources
 * --------------------------------------------------------------------------
 * @property-read Event $Event
 *
 * @method Event Event(integer $id = null)
 *
 * --------------------------------------------------------------------------
 * Comment -> Custom actions
 * --------------------------------------------------------------------------
 * @method array markSpam()     Mark a Comment as spam
 * @method array markNotSpam()  Mark a Comment as not spam
 * @method array approve()      Approve a Comment
 * @method array remove()       Remove a Comment
 * @method array restore()      Restore a Comment
 *
 */
class Comment extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'comment';

    /**
     * @inheritDoc
     */
    protected $childResource = array (
        'Event',
    );

    /**
     * @inheritDoc
     */
    protected $customPostActions = array(
        'spam'      =>  'markSpam',
        'not_spam'  =>  'markNotSpam',
                        'approve',
                        'remove',
                        'restore',
    );
}