<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use Example\Order\Order;
use Example\Order\ValueObjects\DeliveryDateTime;
use Example\Order\ValueObjects\DeliveryEmployeeFullName;
use Example\Order\ValueObjects\OrderId;
use Example\Order\ValueObjects\PaymentAmount;
use Example\Order\ValueObjects\RecipientFullName;
use Example\Order\ValueObjects\Status;
use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

final class DomainModelTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $orderId = '3066ee2e-5fd5-41b3-880d-e984623fd3d5';

        $order = new Order(
            new OrderId($orderId),
            new RecipientFullName('John Snow'),
            Status::received(),
            new PaymentAmount(28.50),
            new DeliveryDateTime($this->tomorrowDate()),
            new DeliveryEmployeeFullName(null)
        );

        $orderArray = $order->toArray();
        $this->assertEquals($orderId, $orderArray['id']);
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $this->expectException(InvalidValueObjectException::class);

        $orderId = '3066ee2e-5fd5-41b3-880d-e984623fd3d5';
        $invalidFullName = 'Crazy 8';

        new Order(
            new OrderId($orderId),
            new RecipientFullName($invalidFullName),
            Status::inTransit(),
            new PaymentAmount(28.50),
            new DeliveryDateTime($this->tomorrowDate()),
            new DeliveryEmployeeFullName('Daenerys Targaryen')
        );
    }

    private function tomorrowDate()
    {
        $date = new \DateTime('now');
        $date->add(new \DateInterval('PT24H'));

        return $date;
    }
}
