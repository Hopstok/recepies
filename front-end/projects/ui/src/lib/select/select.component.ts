import { Component, Input, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';

@Component({
  selector: 'ui-select',
  templateUrl: './select.component.html',
  styleUrls: ['./select.component.scss'],
})
export class SelectComponent implements OnInit {

  @Input() label?: string;
  @Input() options?: any[];

  @Input() formControl: FormControl = new FormControl();

  constructor() {
  }

  ngOnInit() {
  }

}
