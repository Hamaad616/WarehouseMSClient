<?php

namespace App\Imports;

use App\Models\ClientStockRequests;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new ClientStockRequests([
            'client_id' => $row['1'],
            'product_name' => $row['2'],
            'product_description' => $row['3'],
            'category_id' => $row['4'],
            'SKU_ID' => $row['5'],
            'SKU_BARCODE' => $row['6'],
            'product_reorder_level' => $row['7'],
            'product_retail_price' => $row['8'],
            'product_picture' => $row['9']
        ]);
    }
}
