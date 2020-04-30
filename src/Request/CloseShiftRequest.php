<?php

namespace Krasfree\AtolClient\Request;

use Krasfree\AtolClient\Contract\RequestInterface;
use JMS\Serializer\Annotation as Serializer;

class CloseShiftRequest implements RequestInterface
{
    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    private $type = 'closeShift';
}