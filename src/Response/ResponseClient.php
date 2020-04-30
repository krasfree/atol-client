<?php


namespace Krasfree\AtolClient\Response;


use Psr\Http\Message\ResponseInterface;

class ResponseClient
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * ResponseClient constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return object | null
     */
    public function getJson(): ?object
    {
        return json_decode($this->response->getBody()->getContents());
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->response->getBody()->getContents();
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}