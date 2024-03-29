import { Component } from '@angular/core';
import { PriceTableService } from 'src/app/services/price-table.service';

@Component({
  selector: 'app-calculator-form',
  templateUrl: './calculator-form.component.html',
  styleUrls: ['./calculator-form.component.css']
})
export class CalculatorFormComponent {
  financed_amount: number = 0;
  number_of_months: number = 0;
  interest_rate: number = 0;
  initial_payment: number = 0;
  price_table: any[] = [];
  errors: any[] = [];

  constructor(private priceTableService: PriceTableService) {}

  generatePriceTable(): void {
    const requestData = {
      financed_amount: this.financed_amount,
      number_of_months: this.number_of_months,
      interest_rate: this.interest_rate / 100,
      initial_payment: this.initial_payment
    };

    this.priceTableService.getPriceTable(requestData).subscribe({
      next: (response) => {
        this.price_table = response;
        this.errors = [];
      },
      error: (error) => {
        this.errors = [];
        this.price_table = [];
        if(error.error.errors){
          for(const row in error.error.errors){
            const rowErrors: Array<string> = error.error.errors[row];
            rowErrors.forEach(error => {
              this.errors.push(error);
            })
          }
        }
        console.log(this.errors);
      }
    });
  }
}
