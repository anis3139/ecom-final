<?php

namespace App\Exports;

use App\Models\Order;
use DateTime;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class OrderExport implements
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents,
FromQuery,
WithTitle
{
use Exportable;

private $year;

private $month;

public function __construct(int $year, int $month)
{
    $this->year = $year;
    $this->month = $month;
}

public function query()
{
    return  Order::query()->with(['OrderProduct', 'OrderProduct.product'])
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month);
    return $order;
}

public function map($order): array
{
    return [
        $order->id,
        $order->order_id,
        $order->customer_name,
        $order->customer_phone_number,
        $order->address,
        $order->city,
        $order->district,
        $order->postal_code,
        $order->paid_amount,
        $order->delivery_status,
        $order->payment_details,
        $order->transection_id,
        date("jS F, Y", strtotime($order->created_at))
    ];
}

public function headings(): array
{
    return [
        'ID',
        'Order ID',
        'Name',
        'Mobile',
        'Address',
        'City',
        'District',
        'Postal COde',
        'Delivery Status',
        'Payment Details',
        'Transection Id',
        'Delivery Charge',
        'Bill',
        'Order Issued'
    ];
}

public function registerEvents(): array
{
    return [
        AfterSheet::class => function (AfterSheet $event) {
            $event->sheet->getStyle('A1:L1')->applyFromArray([
                'font' => [
                    'bold' => true
                ]
            ]);
        }
    ];
}


public function title(): string
{
    return DateTime::createFromFormat('!m', $this->month)->format('F');
}
}
