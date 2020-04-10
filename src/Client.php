<?php

declare(strict_types=1);

namespace EJTJ3\Teams;

use EJTJ3\Teams\Exception\InvalidPayloadWebHookException;
use GuzzleHttp\Client as httpClient;
use function Couchbase\defaultDecoder;

final class Client
{
    /**
     * @var httpClient
     */
    private $client;

    /**
     * @var string
     */
    private $endPoint;

    public function __construct(string $endPoint)
    {
        $this->endPoint = $endPoint;
    }

    /**
     * @throws InvalidPayloadWebHookException
     */
    public function send(CardInterface $card): void
    {
        $data = \json_encode($card->preparePayload());

        try {
            $response = $this->getClient()->request('POST', $this->endPoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Content-Length' => strlen($data),
                ],
                'connect_timeout' => 3,
                'timeout' => 10,
                'body' => $data,
            ]);
        } catch (\Exception $e) {
            throw new InvalidPayloadWebHookException($e->getMessage());
        }

        if ($response->getBody()->getContents() !== '1') {
            throw new InvalidPayloadWebHookException('Something went wrong!');
        }
    }

    public function getEndPoint(): string
    {
        return $this->endPoint;
    }

    private function getClient(): httpClient
    {
        if ($this->client === null) {
            $this->client = new httpClient();
        }

        return $this->client;
    }
}
