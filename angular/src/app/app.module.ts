import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule} from '@angular/common/http'
import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';

import { PriceTableComponent } from './components/price-table/price-table.component';
import { CalculatorFormComponent } from './components/calculator-form/calculator-form.component';

@NgModule({
  declarations: [
    AppComponent,
    PriceTableComponent,
    CalculatorFormComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
