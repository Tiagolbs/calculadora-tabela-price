import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule} from '@angular/common/http'
import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { CurrencyMaskModule } from "ng2-currency-mask";

import { PriceTableComponent } from './components/price-table/price-table.component';
import { CalculatorFormComponent } from './components/calculator-form/calculator-form.component';
import { FormErrorsListComponent } from './components/form-errors-list/form-errors-list.component';

@NgModule({
  declarations: [
    AppComponent,
    PriceTableComponent,
    CalculatorFormComponent,
    FormErrorsListComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    CurrencyMaskModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
