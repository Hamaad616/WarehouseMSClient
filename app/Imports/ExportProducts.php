<?php

namespace App\Imports;

use App\Models\ClientStockRequests;
use App\Models\product_item;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProducts implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return product_item::all();
    }
}
