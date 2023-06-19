import { Component, Input } from '@angular/core';
@Component({
  selector: 'app-price-table',
  templateUrl: './price-table.component.html',
  styleUrls: ['./price-table.component.css']
})
export class PriceTableComponent {
  @Input() price_table: any[] = [];
}
