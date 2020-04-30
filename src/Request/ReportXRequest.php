<?php


namespace Krasfree\AtolClient\Request;

use JMS\Serializer\Annotation as Serializer;
use Krasfree\AtolClient\Contract\RequestInterface;

class ReportXRequest implements RequestInterface
{
    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    private $type = 'reportX';
}