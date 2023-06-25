<?php
namespace App\DTO;

use App\Http\Requests\V1\PriceRequest;

class PriceTableDTO
{
    public float $financed_amount;
    public int $number_of_months;
    public float $interest_rate;
    public float $initial_payment;

    public function __construct(PriceRequest $request)
    {
        $this->financed_amount = $request->financed_amount;
        $this->number_of_months = $request->number_of_months;
        $this->interest_rate = $request->interest_rate;
        $this->initial_payment = $request->initial_payment ?? 0;
    }
}
