<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductExport implements
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents,
FromQuery
{
    use Exportable;

    public function query()
    {
        return  Product::query();
    }

    public function map($product): array
    {
        return [
            $product->id,
             $product->product_id,
             $product->name,
             $product->meta_title,
             $product->short_description,
             $product->description,
             $product->meta_description,
             $product->thumbnail,
             $product->sku,
             $product->slug,
             $product->is_campaign,
             $product->warranty_policy,
             $product->warranty_period,
             $product->return_policy,
             $product->return_period,
             $product->stock,
             $product->purchase_price,
             $product->product_price,
             $product->product_selling_price,
             $product->discount,
             $product->product_tax,
             $product->product_delivary_charge,
             $product->product_delivary_charge_type,
             $product->product_quantity,
             $product->status,
             $product->feture_products,
             $product->color,
             $product->product_meserment_type,
             $product->category_id,
             $product->brand_id,
             $product->attribute_id,
             $product->attribute,
             $product->vendor_id,
             $product->created_by,
             $product->updated_by,
             $product->deleted_by,
             date("jS F, Y", strtotime($product->created_at)),
             date("jS F, Y", strtotime($product->updated_at))
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Product Id',
            'name',
            'Meta Title',
            'Short Description',
            'Description',
            'Meta Description',
            'Thumbnail',
            'Sku',
            'Slug',
            'Is Campaign',
            'Warranty Policy',
            'Warranty Period',
            'Return Policy',
            'Return Period',
            'Stock',
            'Purchase Price',
            'Product Price',
            'Selling_price',
            'Discount',
            'Tax',
            'Delivary Charge',
            'Delivary Charge Type',
            'Product Quantity',
            'Status',
            'Fetured',
            'Color',
            'Measurement Type',
            'Category Id',
            'Brand Id',
            'Attribute Id',
            'Attribute',
            'Vendor Id',
            'Created By',
            'Updated By',
            'Deleted By',
            'Created At',
            'Updated At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:Al1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
