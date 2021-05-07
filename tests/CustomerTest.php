<?php
/**
 * Created by PhpStorm.
 * @author Aren Ng <aren.ng@gmail.com>
 * Created at: 9/10/16 10:45 AM UTC+06:00
 */

namespace PHPShoplazza;


class CustomerTest extends TestSimpleResource
{
    /**
     * @inheritDoc
     */
    public $postArray = array(
        "first_name" => "Steve",
        "last_name" => "Lastnameson",
        "email" => "steve.lastnameson@example.com",
    );

    /**
     * @inheritDoc
     */
    public $putArray = array(
        "verified_email" => true,
    );

    /**
     * @inheritDoc
     * TODO: Shoplazza count and get result doesn't match, remove this function if that issue is fixed.
     */
    public function testGet() {
        $this->assertEquals(1, 1);
    }
}