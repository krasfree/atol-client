<?php

namespace Krasfree\AtolClient;


use Krasfree\AtolClient\Request\CashRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Krasfree\AtolClient\Response\ResponseClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;


class AtolClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var int
     */
    private $attempts = 1;

    /**
     * @var int
     */
    private $attemptsCheckStatus = 1;

    /**
     * AtolClient constructor.
     * @param Client $client
     * @param Connection $connection
     */
    public function __construct(Client $client, Connection $connection)
    {
        $this->client = $client;
        $this->connection = $connection;
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param CashRequest $request
     * @return ResponseClient
     */
    public function sendRequest(CashRequest $request): ResponseClient
    {
        $requestSerialized = $this->serializer->serialize($request, 'json');
        $url = $this->connection->apiUrl . '/requests';
        try {
            $this->attempts++;
            $response = $this->client->post($url, ['body' => $requestSerialized]);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            if ($this->attempts <= $this->connection->attempts) {
                $this->sendRequest($request);
            }
        }
        $this->logDebug($url, $requestSerialized, $response);

        return new ResponseClient($response);
    }

    /**
     * @param string $uuid
     * @return ResponseClient
     */
    public function checkStatus(string $uuid): ResponseClient
    {
        $url = $this->connection->apiUrl . '/requests/' . $uuid;
        try {
            $this->attemptsCheckStatus++;
            $response = $this->client->get($url);
        } catch (BadResponseException $e) {
             $response = $e->getResponse();
            if ($this->attemptsCheckStatus <= $this->connection->attemptsCheckStatus) {
                $this->checkStatus($uuid);
            }
        }
        $this->logDebug($url, $uuid, $response);

        return new ResponseClient($response);
    }

    /**
     * @param string $url
     * @param $data
     * @param ResponseInterface $response
     */
    private function logDebug(string $url, $data, ResponseInterface $response): void
    {
        if (null !== $this->logger && $this->connection->isDebug()) {
            $msg  = "\nresponse status: " . $response->getStatusCode();
            $msg .= "\nurl: " . $url;
            $msg .= "\npayload ". $data;
            $msg .= "\nresponse content" . $response->getBody()->getContents();
            $msg .= "\nattempts request: " . $this->attempts;
            $msg .= "\nattempts check status: " . $this->attemptsCheckStatus;
            $response->getBody()->rewind();

            $this->logger->debug($msg);
        }
    }
}

