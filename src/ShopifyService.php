<?php

declare(strict_types=1);

namespace Finalbytes\ShopifySdkWrapper;

use Psr\Http\Client\ClientExceptionInterface;
use Shopify\Clients\HttpResponse;
use Shopify\Clients\Rest;
use Shopify\Exception\MissingArgumentException;
use Shopify\Exception\UninitializedContextException;

class ShopifyService
{
    protected Rest $client;

    public function __construct(string $shop, string $accessToken)
    {
        try {
            $this->client = new Rest($shop, $accessToken);
        } catch (MissingArgumentException $e) {
        }
    }

    /**
     * @throws UninitializedContextException
     * @throws ClientExceptionInterface
     */
    public function getShop(): HttpResponse
    {
        return $this->client->get('shop');
    }
}