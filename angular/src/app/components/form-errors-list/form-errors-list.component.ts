import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-form-errors-list',
  templateUrl: './form-errors-list.component.html',
  styleUrls: ['./form-errors-list.component.css']
})
export class FormErrorsListComponent {
  @Input() errors: any[] = [];
}
