import { Component, Input, OnInit, ViewEncapsulation } from '@angular/core';

import { UiFormControl } from '../ui-form-control';

@Component({
  selector: 'ui-input',
  templateUrl: './input.component.html',
  styleUrls: ['./input.component.scss'],
  encapsulation: ViewEncapsulation.None,
})
export class InputComponent extends UiFormControl implements OnInit {

  @Input() type = 'text';

  ngOnInit() {
  }

}
