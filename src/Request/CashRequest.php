<?php


namespace Krasfree\AtolClient\Request;

use Exception;
use JMS\Serializer\Annotation as Serializer;
use Krasfree\AtolClient\Contract\RequestInterface;
use Ramsey\Uuid\Uuid;


class CashRequest
{
    /**
     * @var string
     * @Serializer\SerializedName("uuid")
     * @Serializer\Type("string")
     */
    private $uuid;

    /**
     * @var RequestInterface[]
     * @Serializer\SerializedName("request")
     * @Serializer\Type("array")
     */
    private $request = [];

    /**
     * CashRequest constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->setUuid(Uuid::uuid4()->toString());
        $this->setRequest($request);
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return array
     */
    public function getRequest(): array
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     */
    public function setRequest(RequestInterface $request): void
    {
        $this->request[] = $request;
    }
}