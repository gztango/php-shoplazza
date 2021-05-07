<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at 8/19/16 5:35 PM UTC+06:00
 *
 * @see https://docs.shoplazza.com/api/reference/gift_card Shoplazza API Reference for GiftCard
 */

namespace PHPShoplazza;


/**
 * --------------------------------------------------------------------------
 * GiftCard -> Custom actions
 * --------------------------------------------------------------------------
 * @method array search()       Search for gift cards matching supplied query
 *
 */
class GiftCard extends ShoplazzaResource
{
    /**
     * @inheritDoc
     */
    protected $resourceKey = 'gift_card';

    /**
     * @inheritDoc
     */
    public $searchEnabled = true;

    /**
     * Disable a gift card.
     * Disabling a gift card is permanent and cannot be undone.
     *
     * @return array
     */
    public function disable()
    {
        $url = $this->generateUrl(array(), 'disable');

        $dataArray = array(
            'id' => $this->id,
        );

        return $this->post($dataArray, $url);
    }
}