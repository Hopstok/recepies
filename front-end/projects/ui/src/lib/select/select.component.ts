import { Component, Input, OnInit } from '@angular/core';

import { UiFormControl } from '../ui-form-control';

@Component({
  selector: 'ui-select',
  templateUrl: './select.component.html',
  styleUrls: ['./select.component.scss'],
})
export class SelectComponent extends UiFormControl implements OnInit {

  @Input() allowEmptyOption = true;
  @Input() options: Array<{ value: any, label: string }> = [];

  ngOnInit() {
  }

}
