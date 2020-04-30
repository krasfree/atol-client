<?php

declare(strict_types=1);

namespace Krasfree\AtolClient\Object;

use JMS\Serializer\Annotation as Serializer;

class Tax
{
    const TYPE_NONE = 'none';
    const TYPE_VAT0 = 'vat0';
    const TYPE_VAT10 = 'vat10';
    const TYPE_VAT18 = 'vat18';
    const TYPE_VAT110 = 'vat110';
    const TYPE_VAT118 = 'vat118';
    const TYPE_VAT20 = 'vat20';
    const TYPE_VAT120 = 'vat120';

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
     * Tax constructor.
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
     * @return Tax
     */
    public function setType(string $type): Tax
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
     * @return Tax
     */
    public function setSum(float $sum): Tax
    {
        $this->sum = $sum;
        return $this;
    }
}