import { Input } from '@angular/core';
import { FormControl } from '@angular/forms';

export abstract class UiFormControl {
  @Input() label?: string;
  @Input() placeholder = '';

  @Input() formControl: FormControl = new FormControl();
}
