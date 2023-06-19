<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PriceRequest;
use App\Services\V1\PriceTable;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function getPriceTable(PriceRequest $request){
        $financed_amount = $request->financed_amount;
        $number_of_months = $request->number_of_months;
        $interest_rate = $request->interest_rate;
        $initial_payment = $request->initial_payment ?? 0;

        $price_table_service = new PriceTable();
        $price_table = $price_table_service->generatePriceTable(
            $financed_amount, 
            $interest_rate, 
            $number_of_months, 
            $initial_payment
        );

        return response()->json($price_table);
    }
}
