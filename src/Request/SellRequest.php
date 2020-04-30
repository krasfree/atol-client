<?php

declare(strict_types=1);

namespace Krasfree\AtolClient\Request;

use Krasfree\AtolClient\Contract\RequestInterface;
use Krasfree\AtolClient\Object\ClientInfo;
use Krasfree\AtolClient\Object\Item;
use Krasfree\AtolClient\Object\Payment;
use JMS\Serializer\Annotation as Serializer;

class SellRequest implements RequestInterface
{
    const TYPE_SELL = 'sell';
    const TYPE_SELL_RETURN = 'sellReturn';
    const TYPE_BUY = 'buy';
    const TYPE_BUY_RETURN = 'buyReturn';

    const TAX_TYPE_OSN = 'osn';
    const TAX_TYPE_USN_INCOME = 'usnIncome';
    const TAX_TYPE_USN_INCOME_OUTCOME = 'usnIncomeOutcome';
    const TAX_TYPE_ENVD = 'envd';
    const TAX_TYPE_ESN = 'esn';
    const TAX_TYPE_PATENT = 'patent';

    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @var string
     * @Serializer\SerializedName("taxationType")
     * @Serializer\Type("string")
     */
    private $taxationType;

    /**
     * @var bool
     * @Serializer\SerializedName("ignoreNonFiscalPrintErrors")
     * @Serializer\Type("bool")
     */
    private $ignoreNonFiscalPrintErrors;

    /**
     * @var bool
     * @Serializer\SerializedName("electronically")
     * @Serializer\Type("bool")
     */
    private $electronically;

    /**
     * @var bool
     * @Serializer\SerializedName("useVat18")
     * @Serializer\Type("bool")
     */
    private $useVat18;

    /**
     * @var ClientInfo
     * @Serializer\SerializedName("clientInfo")
     * @Serializer\Type("Krasfree\AtolClient\Object\ClientInfo")
     */
    private $clientInfo;

    /**
     * @var Item[]
     * @Serializer\SerializedName("items")
     * @Serializer\Type("array")
     */
    private $items;

    /**
     * @var Payment[]
     * @Serializer\SerializedName("payments")
     * @Serializer\Type("array")
     */
    private $payments;

    /**
     * @var float
     * @Serializer\SerializedName("total")
     * @Serializer\Type("float")
     */
    private $total;

    /**
     * SellRequest constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->setType($type);
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
     * @return SellRequest
     */
    public function setType(string $type): SellRequest
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxationType(): string
    {
        return $this->taxationType;
    }

    /**
     * @param string $taxationType
     * @return SellRequest
     */
    public function setTaxationType(string $taxationType): SellRequest
    {
        $this->taxationType = $taxationType;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIgnoreNonFiscalPrintErrors(): bool
    {
        return $this->ignoreNonFiscalPrintErrors;
    }

    /**
     * @param bool $ignoreNonFiscalPrintErrors
     * @return SellRequest
     */
    public function setIgnoreNonFiscalPrintErrors(bool $ignoreNonFiscalPrintErrors): SellRequest
    {
        $this->ignoreNonFiscalPrintErrors = $ignoreNonFiscalPrintErrors;
        return $this;
    }

    /**
     * @return bool
     */
    public function isElectronically(): bool
    {
        return $this->electronically;
    }

    /**
     * @param bool $electronically
     * @return SellRequest
     */
    public function setElectronically(bool $electronically): SellRequest
    {
        $this->electronically = $electronically;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseVat18(): bool
    {
        return $this->useVat18;
    }

    /**
     * @param bool $useVat18
     * @return SellRequest
     */
    public function setUseVat18(bool $useVat18): SellRequest
    {
        $this->useVat18 = $useVat18;
        return $this;
    }

    /**
     * @return ClientInfo
     */
    public function getClientInfo(): ClientInfo
    {
        return $this->clientInfo;
    }

    /**
     * @param ClientInfo $clientInfo
     * @return SellRequest
     */
    public function setClientInfo(ClientInfo $clientInfo): SellRequest
    {
        $this->clientInfo = $clientInfo;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return SellRequest
     */
    public function setItems(array $items): SellRequest
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param Payment[] $payments
     * @return SellRequest
     */
    public function setPayments(array $payments): SellRequest
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return SellRequest
     */
    public function setTotal(float $total): SellRequest
    {
        $this->total = $total;
        return $this;
    }
}