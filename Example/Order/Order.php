<?php

declare(strict_types=1);

namespace Example\Order;

use Example\Order\ValueObjects\DeliveryDateTime;
use Example\Order\ValueObjects\DeliveryEmployeeFullName;
use Example\Order\ValueObjects\OrderId;
use Example\Order\ValueObjects\PaymentAmount;
use Example\Order\ValueObjects\RecipientFullName;
use Example\Order\ValueObjects\Status;

/**
 * This is the domain model groping value objects.
 */
final class Order
{
    protected $value;

    public function __construct(
        readonly private OrderId $id,
        readonly private RecipientFullName $recipientFullName,
        readonly private Status $status,
        readonly private PaymentAmount $paymentAmount,
        readonly private DeliveryDateTime $deliveryDateTime,
        readonly private DeliveryEmployeeFullName $deliveryEmployeeFullName
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'recipient_full_name' => $this->recipientFullName->value(),
            'status' => $this->status->value(),
            'payment_amount' => $this->paymentAmount->value(),
            'delivery_date_time' => $this->deliveryDateTime->value(),
            'delivery_employee_full_name' => $this->deliveryEmployeeFullName->value(),
        ];
    }
}
