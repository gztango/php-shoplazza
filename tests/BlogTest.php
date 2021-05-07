<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:43 AM UTC+06:00
 */

namespace PHPShoplazza;


class BlogTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "title" => "PHPShoplazza Test Blog",
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "title" => "PHPShoplazza Test Blog Modified",
    );
}