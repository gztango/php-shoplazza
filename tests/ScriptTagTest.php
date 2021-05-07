<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:50 AM UTC+06:00
 */

namespace PHPShoplazza;


class ScriptTagTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "event" => "onload",
        "src" => "https://djavaskripped.org/fancy.js",
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "src" => "https://somewhere-else.com/another.js",
    );
}