import { Component, Input, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';

@Component({
  selector: 'ui-input',
  templateUrl: './input.component.html',
  styleUrls: ['./input.component.scss'],
})
export class InputComponent implements OnInit {

  @Input() label?: string;
  @Input() placeholder = '';

  @Input() formControl: FormControl = new FormControl();

  constructor() { }

  ngOnInit() {
  }

}
