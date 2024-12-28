<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Order::query()->with(['user', 'staff']);
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->user->name ?? 'N/A',
            $order->staff->name ?? 'N/A',
            $order->payment_method,
            $order->payment_status,
            $order->status,
            $order->grand_total,
            $order->currency,
            $order->shipping_method,
            $order->created_at,
            $order->updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'Customer Name',
            'Staff Name',
            'Payment Method',
            'Payment Status',
            'Status',
            'Grand Total',
            'Currency',
            'Shipping Method',
            'Created At',
            'Updated At',
        ];
    }
}