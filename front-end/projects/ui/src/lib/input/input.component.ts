import { Component, OnInit } from '@angular/core';
import { UiFormControl } from '../ui-form-control';

@Component({
  selector: 'ui-input',
  templateUrl: './input.component.html',
  styleUrls: ['./input.component.scss'],
})
export class InputComponent extends UiFormControl implements OnInit {

  ngOnInit() {
  }

}
