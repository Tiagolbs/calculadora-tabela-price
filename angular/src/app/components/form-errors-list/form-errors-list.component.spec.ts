import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormErrorsListComponent } from './form-errors-list.component';

describe('FormErrorsListComponent', () => {
  let component: FormErrorsListComponent;
  let fixture: ComponentFixture<FormErrorsListComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FormErrorsListComponent]
    });
    fixture = TestBed.createComponent(FormErrorsListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
