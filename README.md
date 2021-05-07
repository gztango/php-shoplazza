# PHP Shoplazza SDK

[![Build Status](https://travis-ci.org/gztango/php-shoplazza.svg?branch=master)](https://travis-ci.org/gztango/php-shoplazza) [![Monthly Downloads](https://poser.pugx.org/gztango/php-shoplazza/d/monthly)](https://packagist.org/packages/gztango/php-shoplazza) [![Total Downloads](https://poser.pugx.org/gztango/php-shoplazza/downloads)](https://packagist.org/packages/gztango/php-shoplazza) [![Latest Stable Version](https://poser.pugx.org/gztango/php-shoplazza/v/stable)](https://packagist.org/packages/gztango/php-shoplazza) [![Latest Unstable Version](https://poser.pugx.org/gztango/php-shoplazza/v/unstable)](https://packagist.org/packages/gztango/php-shoplazza) [![License](https://poser.pugx.org/gztango/php-shoplazza/license)](https://packagist.org/packages/gztango/php-shoplazza) [![Hire](https://img.shields.io/badge/Hire-Upwork-green.svg)](https://www.upwork.com/fl/tareqmahmood?s=1110580755107926016)

PHPShoplazza is a simple SDK implementation of Shoplazza API. It helps accessing the API in an object oriented way. 

## Installation
Install with Composer
```shell
composer require gztango/php-shoplazza
```

### Requirements
PHPShoplazza uses curl extension for handling http calls. So you need to have the curl extension installed and enabled with PHP.
>However if you prefer to use any other available package library for handling HTTP calls, you can easily do so by modifying 1 line in each of the `get()`, `post()`, `put()`, `delete()` methods in `PHPShoplazza\HttpRequestJson` class.

## Usage

You can use PHPShoplazza in a pretty simple object oriented way. 

#### Configure ShoplazzaSDK
If you are using your own private API, provide the ApiKey and Password. 

```php
$config = array(
    'ShopUrl' => 'yourshop.myshoplazza.com',
    'ApiKey' => '***YOUR-PRIVATE-API-KEY***',
    'Password' => '***YOUR-PRIVATE-API-PASSWORD***',
);

PHPShoplazza\ShoplazzaSDK::config($config);
```

For Third party apps, use the permanent access token.

```php
$config = array(
    'ShopUrl' => 'yourshop.myshoplazza.com',
    'AccessToken' => '***ACCESS-TOKEN-FOR-THIRD-PARTY-APP***',
);

PHPShoplazza\ShoplazzaSDK::config($config);
```
##### How to get the permanent access token for a shop?
There is a AuthHelper class to help you getting the permanent access token from the shop using oAuth. 

1) First, you need to configure the SDK with additional parameter SharedSecret

```php
$config = array(
    'ShopUrl' => 'yourshop.myshoplazza.com',
    'ApiKey' => '***YOUR-PRIVATE-API-KEY***',
    'SharedSecret' => '***YOUR-SHARED-SECRET***',
);

PHPShoplazza\ShoplazzaSDK::config($config);
```

2) Create the authentication request 

> The redirect url must be white listed from your app admin as one of **Application Redirect URLs**.

```php
//your_authorize_url.php
$scopes = 'read_products,write_products,read_script_tags,write_script_tags';
//This is also valid
//$scopes = array('read_products','write_products','read_script_tags', 'write_script_tags'); 
$redirectUrl = 'https://yourappurl.com/your_redirect_url.php';

\PHPShoplazza\AuthHelper::createAuthRequest($scopes, $redirectUrl);
```

> If you want the function to return the authentication url instead of auto-redirecting, you can set the argument `$return` (5th argument) to `true`.

```php
\PHPShoplazza\AuthHelper::createAuthRequest($scopes, $redirectUrl, null, null, true);
```

3) Get the access token when redirected back to the `$redirectUrl` after app authorization. 

```php
//your_redirect_url.php
PHPShoplazza\ShoplazzaSDK::config($config);
$accessToken = \PHPShoplazza\AuthHelper::getAccessToken();
//Now store it in database or somewhere else
```

> You can use the same page for creating the request and getting the access token (redirect url). In that case just skip the 2nd parameter `$redirectUrl` while calling `createAuthRequest()` method. The AuthHelper class will do the rest for you.

```php
//your_authorize_and_redirect_url.php
PHPShoplazza\ShoplazzaSDK::config($config);
$accessToken = \PHPShoplazza\AuthHelper::createAuthRequest($scopes);
//Now store it in database or somewhere else
```

#### Get the ShoplazzaSDK Object

```php
$shoplazza = new PHPShoplazza\ShoplazzaSDK;
```

You can provide the configuration as a parameter while instantiating the object (if you didn't configure already by calling `config()` method)

```php
$shoplazza = new PHPShoplazza\ShoplazzaSDK($config);
```

##### Now you can do `get()`, `post()`, `put()`, `delete()` calling the resources in the object oriented way. All resources are named as same as it is named in shoplazza API reference. (See the resource map below.) 
> All the requests returns an array (which can be a single resource array or an array of multiple resources) if succeeded. When no result is expected (for example a DELETE request), an empty array will be returned.

- Get all product list (GET request)

```php
$products = $shoplazza->Product->get();
```

- Get any specific product with ID (GET request)

```php
$productID = 23564666666;
$product = $shoplazza->Product($productID)->get();
```

You can also filter the results by using the url parameters (as specified by Shoplazza API Reference for each specific resource). 

- For example get the list of cancelled orders after a specified date and time (and `fields` specifies the data columns for each row to be rendered) : 

```php
$params = array(
    'status' => 'cancelled',
    'created_at_min' => '2016-06-25T16:15:47-04:00',
    'fields' => 'id,line_items,name,total_price'
);

$orders = $shoplazza->Order->get($params);
```

- Create a new order (POST Request)

```php
$order = array (
    "email" => "foo@example.com",
    "fulfillment_status" => "unfulfilled",
    "line_items" => [
      [
          "variant_id" => 27535413959,
          "quantity" => 5
      ]
    ]
);

$shoplazza->Order->post($order);
```

> Note that you don't need to wrap the data array with the resource key (`order` in this case), which is the expected syntax from Shoplazza API. This is automatically handled by this SDK.


- Update an order (PUT Request)

```php
$updateInfo = array (
    "fulfillment_status" => "fulfilled",
);

$shoplazza->Order($orderID)->put($updateInfo);
```

- Remove a Webhook (DELETE request)

```php
$webHookID = 453487303;

$shoplazza->Webhook($webHookID)->delete();
```


### The child resources can be used in a nested way.
> You must provide the ID of the parent resource when trying to get any child resource

- For example, get the images of a product (GET request)

```php
$productID = 23564666666;
$productImages = $shoplazza->Product($productID)->Image->get();
```

- Add a new address for a customer (POST Request)

```php
$address = array(
    "address1" => "129 Oak St",
    "city" => "Ottawa",
    "province" => "ON",
    "phone" => "555-1212",
    "zip" => "123 ABC",
    "last_name" => "Lastnameson",
    "first_name" => "Mother",
    "country" => "CA",
);

$customerID = 4425749127;

$shoplazza->Customer($customerID)->Address->post($address);
```

- Create a fulfillment event (POST request)

```php
$fulfillmentEvent = array(
    "status" => "in_transit"
);

$shoplazza->Order($orderID)->Fulfillment($fulfillmentID)->Event->post($fulfillmentEvent);
```

- Update a Blog article (PUT request)

```php
$blogID = 23564666666;
$articleID = 125336666;
$updateArtilceInfo = array(
    "title" => "My new Title",
    "author" => "Your name",
    "tags" => "Tags, Will Be, Updated",
    "body_html" => "<p>Look, I can even update through a web service.<\/p>",
);
$shoplazza->Blog($blogID)->Article($articleID)->put($updateArtilceInfo);
```

- Delete any specific article from a specific blog (DELETE request)

```php
$blogArticle = $shoplazza->Blog($blogID)->Article($articleID)->delete();
```

### GraphQL <sup>*v1.1*</sup>
The GraphQL Admin API is a GraphQL-based alternative to the REST-based Admin API, and makes the functionality of the Shoplazza admin available at a single GraphQL endpoint. The full set of supported types can be found in the [GraphQL Admin API reference](https://help.shoplazza.com/en/api/graphql-admin-api/reference).
You can simply call the GraphQL resource and make a post request with a GraphQL string:

> The GraphQL Admin API requires an access token for making authenticated requests. You can obtain an access token either by creating a private app and using that app's API password, or by following the OAuth authorization process. See [GraphQL Authentication Guide](https://help.shoplazza.com/en/api/graphql-admin-api/getting-started#authentication)

```php
$graphQL = <<<Query
query {
  shop {
    name
    primaryDomain {
      url
      host
    }
  }
}
Query;

$data = $shoplazza->GraphQL->post($graphQL);
```
##### Variables
If you want to use [GraphQL variables](https://shoplazza.dev/concepts/graphql/variables), you need to put the variables in an array and give it as the 4th argument of the `post()` method. The 2nd and 3rd arguments don't have any use in GraphQL, but are there to keep similarity with other requests, you can just keep those as `null`. Here is an example: 

```php
$graphQL = <<<Query
mutation ($input: CustomerInput!) {
  customerCreate(input: $input)
  {
    customer {
      id
      displayName
    }
    userErrors {
      field
      message
    }
  }
}
Query;

$variables = [
  "input" => [
    "firstName" => "Greg",
    "lastName" => "Variables",
    "email" => "gregvariables@teleworm.us"
  ]
]
$shoplazza->GraphQL->post($graphQL, null, null, $variables);
```


##### GraphQL Builder
This SDK only accepts a GraphQL string as input. You can build your GraphQL from [Shoplazza GraphQL Builder](https://help.shoplazza.com/en/api/graphql-admin-api/graphiql-builder)


### Resource Mapping
Some resources are available directly, some resources are only available through parent resources and a few resources can be accessed both ways. It is recommended that you see the details in the related Shoplazza API Reference page about each resource. Each resource name here is linked to related Shoplazza API Reference page.
> Use the resources only by listed resource map. Trying to get a resource directly which is only available through parent resource may end up with errors.

- [AbandonedCheckout](https://help.shoplazza.com/api/reference/abandoned_checkouts)
- [ApplicationCharge](https://help.shoplazza.com/api/reference/applicationcharge)
- [Blog](https://help.shoplazza.com/api/reference/blog/)
- Blog -> [Article](https://help.shoplazza.com/api/reference/article/)
- Blog -> Article -> [Event](https://help.shoplazza.com/api/reference/event/)
- Blog -> Article -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- Blog -> [Event](https://help.shoplazza.com/api/reference/event/)
- Blog -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [CarrierService](https://help.shoplazza.com/api/reference/carrierservice/)
- [Collect](https://help.shoplazza.com/api/reference/collect/)
- [Comment](https://help.shoplazza.com/api/reference/comment/)
- Comment -> [Event](https://help.shoplazza.com/api/reference/event/)
- [Country](https://help.shoplazza.com/api/reference/country/)
- Country -> [Province](https://help.shoplazza.com/api/reference/province/)
- [Currency](https://help.shoplazza.com/en/api/reference/store-properties/currency)
- [CustomCollection]()
- CustomCollection -> [Event](https://help.shoplazza.com/api/reference/event/)
- CustomCollection -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [Customer](https://help.shoplazza.com/api/reference/customer/)
- Customer -> [Address](https://help.shoplazza.com/api/reference/customeraddress/)
- Customer -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- Customer -> [Order](https://help.shoplazza.com/api/reference/order)
- [CustomerSavedSearch](https://help.shoplazza.com/api/reference/customersavedsearch/)
- CustomerSavedSearch -> [Customer](https://help.shoplazza.com/api/reference/customer/)
- [DraftOrder](https://help.shoplazza.com/api/reference/draftorder)
- [Discount](https://help.shoplazza.com/api/reference/discount) _(Shoplazza Plus Only)_
- [DiscountCode](https://help.shoplazza.com/en/api/reference/discounts/discountcode)
- [Event](https://help.shoplazza.com/api/reference/event/)
- [FulfillmentService](https://help.shoplazza.com/api/reference/fulfillmentservice)
- [GiftCard](https://help.shoplazza.com/api/reference/gift_card) _(Shoplazza Plus Only)_
- [InventoryItem](https://help.shoplazza.com/api/reference/inventoryitem)
- [InventoryLevel](https://help.shoplazza.com/api/reference/inventorylevel)
- [Location](https://help.shoplazza.com/api/reference/location/) _(read only)_
- Location -> [InventoryLevel](https://help.shoplazza.com/api/reference/inventorylevel)
- [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [Multipass](https://help.shoplazza.com/api/reference/multipass) _(Shoplazza Plus Only, API not available yet)_
- [Order](https://help.shoplazza.com/api/reference/order)
- Order -> [Fulfillment](https://help.shoplazza.com/api/reference/fulfillment)
- Order -> Fulfillment -> [Event](https://help.shoplazza.com/api/reference/fulfillmentevent)
- Order -> [Risk](https://help.shoplazza.com/api/reference/order_risks)
- Order -> [Refund](https://help.shoplazza.com/api/reference/refund)
- Order -> [Transaction](https://help.shoplazza.com/api/reference/transaction)
- Order -> [Event](https://help.shoplazza.com/api/reference/event/)
- Order -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [Page](https://help.shoplazza.com/api/reference/page)
- Page -> [Event](https://help.shoplazza.com/api/reference/event/)
- Page -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [Policy](https://help.shoplazza.com/api/reference/policy) _(read only)_
- [Product](https://help.shoplazza.com/api/reference/product)
- Product -> [Image](https://help.shoplazza.com/api/reference/product_image)
- Product -> [Variant](https://help.shoplazza.com/api/reference/product_variant)
- Product -> Variant -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- Product -> [Event](https://help.shoplazza.com/api/reference/event/)
- Product -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [ProductListing](https://help.shoplazza.com/api/reference/sales_channels/productlisting)
- [ProductVariant](https://help.shoplazza.com/api/reference/product_variant)
- ProductVariant -> [Metafield](https://help.shoplazza.com/api/reference/metafield)
- [RecurringApplicationCharge](https://help.shoplazza.com/api/reference/recurringapplicationcharge)
- RecurringApplicationCharge -> [UsageCharge](https://help.shoplazza.com/api/reference/usagecharge)
- [Redirect](https://help.shoplazza.com/api/reference/redirect)
- [ScriptTag](https://help.shoplazza.com/api/reference/scripttag)
- [ShippingZone](https://help.shoplazza.com/api/reference/shipping_zone) _(read only)_
- [Shop](https://help.shoplazza.com/api/reference/shop) _(read only)_
- [SmartCollection](https://help.shoplazza.com/api/reference/smartcollection)
- SmartCollection -> [Event](https://help.shoplazza.com/api/reference/event/)
- [ShoplazzaPayment](https://shoplazza.dev/docs/admin-api/rest/reference/shoplazza_payments/)
- ShoplazzaPayment -> [Dispute](https://shoplazza.dev/docs/admin-api/rest/reference/shoplazza_payments/dispute/) _(read only)_
- [Theme](https://help.shoplazza.com/api/reference/theme)
- Theme -> [Asset](https://help.shoplazza.com/api/reference/asset/)
- [User](https://help.shoplazza.com/api/reference/user) _(read only, Shoplazza Plus Only)_
- [Webhook](https://help.shoplazza.com/api/reference/webhook)
- [GraphQL](https://help.shoplazza.com/en/api/graphql-admin-api/reference)

### Custom Actions
There are several action methods which can be called without calling the `get()`, `post()`, `put()`, `delete()` methods directly, but eventually results in a custom call to one of those methods.

- For example, get count of total products
```php
$productCount = $shoplazza->Product->count();
```

- Make an address default for the customer.
```php
$shoplazza->Customer($customerID)->Address($addressID)->makeDefault();
```

- Search for customers with keyword "Bob" living in country "United States".
```php
$shoplazza->Customer->search("Bob country:United States");
```

#### Custom Actions List
The custom methods are specific to some resources which may not be available for other resources.  It is recommended that you see the details in the related Shoplazza API Reference page about each action. We will just list the available actions here with some brief info. each action name is linked to an example in Shoplazza API Reference which has more details information.

- (Any resource type except _ApplicationCharge, CarrierService, FulfillmentService, Location, Policy, RecurringApplicationCharge, ShippingZone, Shop, Theme_) ->
    - [count()](https://help.shoplazza.com/api/reference/product#count)
    Get a count of all the resources.
    Unlike all other actions, this function returns an integer value.

- Comment ->
    - [markSpam()](https://help.shoplazza.com/api/reference/comment#spam)
    Mark a Comment as spam
    - [markNotSpam()](https://help.shoplazza.com/api/reference/comment#not_spam)
    Mark a Comment as not spam
    - [approve()](https://help.shoplazza.com/api/reference/comment#approve)
    Approve a Comment
    - [remove()](https://help.shoplazza.com/api/reference/comment#remove)
    Remove a Comment
    - [restore()](https://help.shoplazza.com/api/reference/comment#restore)
    Restore a Comment
    
- Customer ->
    - [search()](https://help.shoplazza.com/api/reference/customer#search)
    Search for customers matching supplied query
    - [send_invite($data)](https://help.shoplazza.com/en/api/reference/customers/customer#send_invite)
    Sends an account invite to a customer.
    
- Customer -> Address ->
    - [makeDefault()](https://help.shoplazza.com/api/reference/customeraddress#default)
    Sets the address as default for the customer
    - [set($params)](https://help.shoplazza.com/api/reference/customeraddress#set)
    Perform bulk operations against a number of addresses
    
- DraftOrder ->
    - [send_invoice($data)]()
    Send the invoice for a DraftOrder
    - [complete($data)]()
    Complete a DraftOrder
    
- Discount ->
    - [enable()]()
    Enable a discount
    - [disable()]()
    Disable a discount
    
- DiscountCode ->
    - [lookup($data)]()
    Retrieves the location of a discount code.    
    
- Fulfillment ->
    - [complete()](https://help.shoplazza.com/api/reference/fulfillment#complete)
    Complete a fulfillment
    - [open()](https://help.shoplazza.com/api/reference/fulfillment#open)
    Open a pending fulfillment
    - [cancel()](https://help.shoplazza.com/api/reference/fulfillment#cancel)
    Cancel a fulfillment
    
- GiftCard ->
    - [disable()](https://help.shoplazza.com/api/reference/gift_card#disable)
    Disable a gift card.
    - [search()](https://help.shoplazza.com/api/reference/gift_card#search)
    Search for gift cards matching supplied query
    
- InventoryLevel ->
    - [adjust($data)](https://help.shoplazza.com/api/reference/inventorylevel#adjust)
    Adjust inventory level.
    - [connect($data)](https://help.shoplazza.com/api/reference/inventorylevel#connect)
    Connect an inventory item to a location.
    - [set($data)](https://help.shoplazza.com/api/reference/inventorylevel#set)
    Set an inventory level for a single inventory item within a location.
    
- Order ->
    - [close()](https://help.shoplazza.com/api/reference/order#close)
    Close an Order
    - [open()](https://help.shoplazza.com/api/reference/order#open)
    Re-open a closed Order
    - [cancel($data)](https://help.shoplazza.com/api/reference/order#cancel)
    Cancel an Order

- Order -> Refund ->
    - [calculate()](https://help.shoplazza.com/api/reference/refund#calculate)
    Calculate a Refund.
    
- ProductListing ->
    - [productIds()](https://help.shoplazza.com/api/reference/sales_channels/productlisting#product_ids)
    Retrieve product_ids that are published to your app.
    
- RecurringApplicationCharge -> 
    - [activate()](https://help.shoplazza.com/api/reference/recurringapplicationcharge#activate)
    Activate a recurring application charge
    - [customize($data)](https://help.shoplazza.com/api/reference/recurringapplicationcharge#customize)
    Customize a recurring application charge
    
- SmartCollection -> 
    - [sortOrder($params)](https://help.shoplazza.com/api/reference/smartcollection#order)
    Set the ordering type and/or the manual order of products in a smart collection
    
- User ->
    - [current()](https://help.shoplazza.com/api/reference/user#current)
    Get the current logged-in user

### Shoplazza API features headers
To send `X-Shoplazza-Api-Features` headers while using the SDK, you can use the following:

```
$config['ShoplazzaApiFeatures'] = ['include-presentment-prices'];
$shoplazza = new PHPShoplazza\ShoplazzaSDK($config);
```


## Reference
- [Shoplazza API Reference](https://help.shoplazza.com/api/reference/)

## Paid Support
You can hire the author of this SDK for setting up your project with PHPShoplazza SDK. 

[Hire at Upwork](https://www.upwork.com/fl/tareqmahmood?s=1110580755107926016)

## Backers

Support us with a monthly donation and help us continue our activities. [[Become a backer](https://opencollective.com/phpshoplazza#backer)]

<a href="https://opencollective.com/phpshoplazza/backer/0/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/0/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/1/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/1/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/2/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/2/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/3/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/3/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/4/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/4/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/5/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/5/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/6/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/6/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/7/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/7/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/8/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/8/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/9/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/9/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/10/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/10/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/11/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/11/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/12/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/12/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/13/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/13/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/14/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/14/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/15/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/15/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/16/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/16/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/17/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/17/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/18/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/18/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/19/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/19/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/20/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/20/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/21/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/21/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/22/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/22/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/23/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/23/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/24/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/24/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/25/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/25/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/26/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/26/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/27/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/27/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/28/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/28/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/backer/29/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/backer/29/avatar.svg"></a>


## Sponsors

Become a sponsor and get your logo on our README on Github with a link to your site. [[Become a sponsor](https://opencollective.com/phpshoplazza#sponsor)]

<a href="https://opencollective.com/phpshoplazza/sponsor/0/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/0/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/1/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/1/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/2/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/2/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/3/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/3/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/4/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/4/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/5/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/5/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/6/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/6/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/7/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/7/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/8/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/8/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/9/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/9/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/10/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/10/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/11/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/11/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/12/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/12/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/13/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/13/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/14/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/14/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/15/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/15/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/16/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/16/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/17/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/17/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/18/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/18/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/19/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/19/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/20/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/20/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/21/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/21/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/22/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/22/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/23/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/23/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/24/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/24/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/25/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/25/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/26/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/26/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/27/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/27/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/28/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/28/avatar.svg"></a>
<a href="https://opencollective.com/phpshoplazza/sponsor/29/website" target="_blank"><img src="https://opencollective.com/phpshoplazza/sponsor/29/avatar.svg"></a>
