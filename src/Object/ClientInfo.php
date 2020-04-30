<?php

declare(strict_types=1);

namespace Krasfree\AtolClient\Object;

use JMS\Serializer\Annotation as Serializer;

class ClientInfo
{
    /**
     * @var string
     * @Serializer\SerializedName("emailOrPhone")
     * @Serializer\Type("string")
     */
    private $emailOrPhone;

    /**
     * @var string
     * @Serializer\SerializedName("vatin")
     * @Serializer\Type("string")
     */
    private $vatin;

    /**
     * @var string
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * ClientInfo constructor.
     * @param string $emailOrPhone
     */
    public function __construct(string $emailOrPhone)
    {
        $this->setEmailOrPhone($emailOrPhone);
    }

    /**
     * @return string
     */
    public function getEmailOrPhone(): string
    {
        return $this->emailOrPhone;
    }

    /**
     * @param string $emailOrPhone
     * @return ClientInfo
     */
    public function setEmailOrPhone(string $emailOrPhone): ClientInfo
    {
        $this->emailOrPhone = $emailOrPhone;
        return $this;
    }

    /**
     * @return string
     */
    public function getVatin(): string
    {
        return $this->vatin;
    }

    /**
     * @param string $vatin
     * @return ClientInfo
     */
    public function setVatin(string $vatin): ClientInfo
    {
        $this->vatin = $vatin;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ClientInfo
     */
    public function setName(string $name): ClientInfo
    {
        $this->name = $name;
        return $this;
    }
}