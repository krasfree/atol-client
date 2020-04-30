<?php

declare(strict_types=1);

namespace  Krasfree\AtolClient\Object;

use JMS\Serializer\Annotation as Serializer;

class Item
{
    const PAYMENT_METHOD_FULL_PREPAYMENT = 'fullPrepayment';
    const PAYMENT_METHOD_PREPAYMENT = 'prepayment';
    const PAYMENT_METHOD_ADVANCE = 'advance';
    const PAYMENT_METHOD_FULL_PAYMENT = 'fullPayment';
    const PAYMENT_METHOD_PARTIAL_PAYMENT = 'partialPayment';
    const PAYMENT_METHOD_CREDIT = 'credit';
    const PAYMENT_METHOD_CREDIT_PAYMENT = 'creditPayment';

    const PAYMENT_OBJECT_COMMODITY = 'commodity';
    const PAYMENT_OBJECT_EXCISE = 'excise';
    const PAYMENT_OBJECT_JOB = 'job';
    const PAYMENT_OBJECT_SERVICE = 'service';
    const PAYMENT_OBJECT_GAMBLING_BET = 'gamblingBet';
    const PAYMENT_OBJECT_GAMBLING_PRIZE = 'gamblingPrize';
    const PAYMENT_OBJECT_LOTTERY = 'lottery';
    const PAYMENT_OBJECT_LOTTERY_PRIZE = 'lotteryPrize';
    const PAYMENT_OBJECT_INTELLECTUAL_ACTIVITY = 'intellectualActivity';
    const PAYMENT_OBJECT_PAYMENT = 'payment';
    const PAYMENT_OBJECT_AGENT_COMMISSION = 'agentCommission';
    const PAYMENT_OBJECT_COMPOSITE = 'composite';
    const PAYMENT_OBJECT_ANOTHER = 'another';

    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    private $type = 'position';

    /**
     * @var string
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var float
     * @Serializer\SerializedName("price")
     * @Serializer\Type("float")
     */
    private $price;

    /**
     * @var float
     * @Serializer\SerializedName("quantity")
     * @Serializer\Type("float")
     */
    private $quantity;

    /**
     * @var float
     * @Serializer\SerializedName("amount")
     * @Serializer\Type("float")
     */
    private $amount;

    /**
     * @var float
     * @Serializer\SerializedName("infoDiscountAmount")
     * @Serializer\Type("float")
     */
    private $infoDiscountAmount;

    /**
     * @var string
     * @Serializer\SerializedName("paymentMethod")
     * @Serializer\Type("string")
     */
    private $paymentMethod;

    /**
     * @var string
     * @Serializer\SerializedName("paymentObject")
     * @Serializer\Type("string")
     */
    private $paymentObject;

    /**
     * @var Tax
     * @Serializer\SerializedName("tax")
     * @Serializer\Type("Krasfree\AtolClient\Object\Tax")
     */
    private $tax;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Item
     */
    public function setPrice(float $price): Item
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return Item
     */
    public function setQuantity(float $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Item
     */
    public function setAmount(float $amount): Item
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getInfoDiscountAmount(): float
    {
        return $this->infoDiscountAmount;
    }

    /**
     * @param float $infoDiscountAmount
     * @return Item
     */
    public function setInfoDiscountAmount(float $infoDiscountAmount): Item
    {
        $this->infoDiscountAmount = $infoDiscountAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return Item
     */
    public function setPaymentMethod(string $paymentMethod): Item
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentObject(): string
    {
        return $this->paymentObject;
    }

    /**
     * @param string $paymentObject
     * @return Item
     */
    public function setPaymentObject(string $paymentObject): Item
    {
        $this->paymentObject = $paymentObject;
        return $this;
    }

    /**
     * @return Tax
     */
    public function getTax(): Tax
    {
        return $this->tax;
    }

    /**
     * @param Tax $tax
     * @return Item
     */
    public function setTax(Tax $tax): Item
    {
        $this->tax = $tax;
        return $this;
    }
}