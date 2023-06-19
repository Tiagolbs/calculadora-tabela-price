import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PriceTableService {
  constructor(private http: HttpClient) { }

  getPriceTable(requestData: any): Observable<any> {
    return this.http.post<any>('http://localhost:8000/api/v1/price-table', requestData);
  }
}
