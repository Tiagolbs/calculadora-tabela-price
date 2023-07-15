<?php

use App\Services\V1\PriceTable;
use Carbon\Carbon;
use Tests\TestCase;

class PriceTableTest extends TestCase
{
	public function testGetInterest()
	{
		$price_table_service = new PriceTable();

		$financed_amount = 15000;
		$interest_rate = 0.05;
		$expected_value = 750;

		$result = $price_table_service->getInterest($financed_amount, $interest_rate);

		$this->assertEquals($expected_value, $result, 'Incorrect interest value');
	}

	public function testGetInstallmentValue()
	{
		$price_table_service = new PriceTable();

		$financed_amount = 10000;
		$interest_rate = 0.0005;
		$number_of_months = 12;
		$expected_value = 836.04;

		$result = $price_table_service->getInstallmentValue($financed_amount, $interest_rate, $number_of_months);

		$this->assertEquals($expected_value, round($result, 2), 'Incorrect installment value');

		$financed_amount = 15000;
		$interest_rate = 0.0010;
		$number_of_months = 12;
		$expected_value = 1258.14;

		$result = $price_table_service->getInstallmentValue($financed_amount, $interest_rate, $number_of_months);

		$this->assertEquals($expected_value, round($result, 2), 'Incorrect installment value');
	}

	public function testGetPaymentDate()
	{
		$price_table_service = new PriceTable();

		$payment_date = Carbon::create(2023, 7, 1);
		$expected_date = Carbon::create(2023, 8, 1);

		$result = $price_table_service->getPaymentDate($payment_date);

		$this->assertEquals($expected_date, $result, 'Incorrect payment date');

		$payment_date = Carbon::create(2023, 7, 15);
		$expected_date = Carbon::create(2023, 8, 1);

		$result = $price_table_service->getPaymentDate($payment_date);

		$this->assertEquals($expected_date, $result, 'Incorrect payment date');
	}

	public function testGetAmortization()
	{
		$price_table_service = new PriceTable();

		$installment_value = 500;
		$interest = 100;
		$expected_value = 400;

		$result = $price_table_service->getAmortization($installment_value, $interest);

		$this->assertEquals($expected_value, $result, 'Incorrect amortization value');

		$installment_value = 1000;
		$interest = 500;
		$expected_value = 500;

		$result = $price_table_service->getAmortization($installment_value, $interest);

		$this->assertEquals($expected_value, $result, 'Incorrect amortization value');
	}
}