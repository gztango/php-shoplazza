<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:49 AM UTC+06:00
 */

namespace PHPShoplazza;


class RedirectTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "path" => "http://www.apple.com/forums",
        "target" => "http://forums.apple.com",
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "path" => "/tiger",
    );
}