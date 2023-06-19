<?php

namespace App\Services\V1;

class PriceTable {
    public function generatePriceTable(float $financed_amount, float $interest_rate, int $number_of_months, float $initial_payment): array
    {
        $financed_amount -= $initial_payment;

        $installment_value = $this->getInstallmentValue($financed_amount, $interest_rate, $number_of_months);

        $total_interest = 0;
        $total_amortization = 0;
        $total_installment_value = 0;

        $price_table = [];
        $price_table[] = $this->createTableFirstRow($financed_amount);
        
        for ($i = 1; $i <= $number_of_months; $i++) {
            $interest = $this->getInterest($financed_amount, $interest_rate);
            $amortization = $this->getAmortization($installment_value, $interest);
            
            if ($i === $number_of_months) {
                $amortization = $financed_amount;
                $installment_value = $financed_amount + $interest;
                $financed_amount = 0;
            } else {
                $financed_amount -= $amortization;
            }

            $price_table[] = [
                'installment_number' => $i,
                'installment_value' => round($installment_value, 2),
                'interest' => round($interest, 2),
                'amortization' => round($amortization, 2),
                'remaining_balance' => round($financed_amount, 2)
            ];

            $total_amortization += $amortization;
            $total_installment_value += $installment_value;
            $total_interest += $interest;
        }

        $price_table[] = $this->createTableTotalRow($total_installment_value, $total_amortization, $total_interest);

        return $price_table;
    }

    private function createTableFirstRow(float $financed_amount): array
    {
        return [
            'installment_number' => 0,
            'installment_value' => 0,
            'interest' => 0,
            'amortization' => 0,
            'remaining_balance' => round($financed_amount, 2)
        ];
    }

    private function createTableTotalRow(float $total_installment_value, float $total_amortization, float $total_interest): array
    {
        return [
            'installment_number' => 'Total',
            'installment_value' => round($total_installment_value, 2),
            'interest' => round($total_interest, 2),
            'amortization' => round($total_amortization, 2),
            'remaining_balance' => 0
        ];
    }

    private function getInstallmentValue(float $financed_amount, float $interest_rate, int $number_of_months): float
    {
        return ($financed_amount * $interest_rate) / (1 - pow(1 + $interest_rate, -$number_of_months));
    }

    private function getInterest(float $financed_amount, float $interest_rate): float
    {
        return $financed_amount * $interest_rate;
    }

    private function getAmortization(float $installment_value, float $interest): float
    {
        return $installment_value - $interest;
    }
}