import { Component, Input, OnInit } from '@angular/core';
import { FormGroup } from '@angular/forms';

export enum FormLayout {
  VERTICAL = 'vertical',
  HORIZONTAL = 'horizontal',
  COMPACT = 'compact',
}

@Component({
  selector: 'ui-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss'],
})
export class FormComponent implements OnInit {

  @Input() layout: FormLayout = FormLayout.VERTICAL;
  @Input() formGroup: FormGroup = new FormGroup({});

  constructor() { }

  ngOnInit() {
  }

}
