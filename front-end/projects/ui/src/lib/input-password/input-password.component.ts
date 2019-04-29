import { Component, Input, ViewEncapsulation } from '@angular/core';

import { UiFormControl } from '../ui-form-control';

@Component({
  selector: 'ui-input-password',
  templateUrl: './input-password.component.html',
  styleUrls: ['./input-password.component.scss'],
  encapsulation: ViewEncapsulation.None,
})
export class InputPasswordComponent extends UiFormControl {
  @Input() type = 'password';
}
