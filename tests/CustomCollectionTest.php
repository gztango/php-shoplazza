<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:45 AM UTC+06:00
 */

namespace PHPShoplazza;


class CustomCollectionTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "title" => "Macbooks"
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "title" => "Updated - Macbooks",
        "body_html" => "<p>The best selling Macbooks ever</p>",
    );
}