<?php

namespace App\Http\Controllers\V1;

use App\DTO\PriceTableDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PriceRequest;
use App\Services\V1\PriceTable;

class PriceController extends Controller
{
    public function getPriceTable(PriceRequest $request){
        $price_table_dto = new PriceTableDTO($request);

        $price_table_service = new PriceTable();
        $price_table = $price_table_service->generatePriceTable($price_table_dto);

        return response()->json($price_table);
    }
}
