<?php

declare(strict_types=1);

namespace Krasfree\AtolClient\Object;

use JMS\Serializer\Annotation as Serializer;

class Payment
{
    const PAYMENT_TYPE_CASH = 'cash';
    const PAYMENT_TYPE_ELECTRONICALLY = 'electronically';
    const PAYMENT_TYPE_PREPAID = 'prepaid';
    const PAYMENT_TYPE_CREDIT = 'credit';
    const PAYMENT_TYPE_OTHER = 'other';

    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var float
     * @Serializer\SerializedName("sum")
     * @Serializer\Type("float")
     */
    private $sum;

    /**
     * Payment constructor.
     * @param string $type
     * @param float $sum
     */
    public function __construct(string $type, float $sum)
    {
        $this->setType($type);
        $this->setSum($sum);
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Payment
     */
    public function setType(string $type): Payment
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     * @return Payment
     */
    public function setSum(float $sum): Payment
    {
        $this->sum = $sum;
        return $this;
    }
}