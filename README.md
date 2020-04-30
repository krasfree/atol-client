# API-клиент для кассы АТОЛ 

## О проекте
Данная библиотека предназначена для работы с API кассы АТОЛ.

## Установка
Предполагается установка с использованием composer
```
composer require krasfree/atol-client
```

## Пример использования
### Печать чека прихода
Можно указать различные варианты систем налогообложения, передавать e-mail или телефон покупателя, использовать различные взаиморасчеты, а так-же установить, требуется фактическая печать чека или нет. 
Подробно о параметрах можно посмотреть на сайте [Атол](https://integration.atol.ru/api/#web-server)
```php
// создаем товарную позицию 
$item = new Item();
$item->setName('Наименование товара')
     ->setPrice(2000)
     ->setQuantity(1)
     ->setAmount(2000)
     ->setTax(new Tax(Tax::TYPE_VAT0, 0))
     ->setPaymentMethod(Item::PAYMENT_METHOD_FULL_PAYMENT)
     ->setPaymentObject(Item::PAYMENT_OBJECT_COMMODITY);

// запрос на печать чека
$sell = new SellRequest(SellRequest::TYPE_SELL);
$sell->setTaxationType(SellRequest::TAX_TYPE_USN_INCOME)
     ->setElectronically(false)
     ->setClientInfo(new ClientInfo('ivan@ivan.com'))
     ->setItems([$item])
     ->setPayments([new Payment(Payment::PAYMENT_TYPE_ELECTRONICALLY, $order->total)])
     ->setTotal(2000);


$client = new AtolClient(new Client(), new Connection());
//$client->setLogger(LoggerInterface);
$response = $client->sendRequest(new CashRequest($sell));

// получаем результат запроса
$response->getStatusCode();
$response->getContents();
```
### Возврат чека прихода
```php
// возврат чека происходит так-же как и печать, только операция возврат
$sell = new SellRequest(SellRequest::TYPE_SELL_RETURN);
```

### Закрытие смены
```php
$request = new CashRequest(new CloseShiftRequest());
$response = $client->sendRequest($request);
```

### Печать x-отчета
```php
$request = new CashRequest(new ReportXRequest());
$response = $client->sendRequest($request);
```
### Получить результат выполнения задания
```php
$response = $client->checkStatus('uuid задания');

// получаем результат запроса
$response->getStatusCode();
$response->getContents();
```

