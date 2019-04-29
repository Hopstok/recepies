import { CUSTOM_ELEMENTS_SCHEMA, NgModule} from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ClarityModule, ClrFormsModule } from '@clr/angular';

import { FormComponent } from './form/form.component';
import { InputComponent } from './input/input.component';
import { SelectComponent } from './select/select.component';
import { UiComponent } from './ui.component';

const COMPONENTS = [
  FormComponent,
  InputComponent,
  SelectComponent,
];

@NgModule({
  declarations: [
    UiComponent,
    ...COMPONENTS,
  ],
  imports: [
    BrowserAnimationsModule,
    FormsModule,
    ReactiveFormsModule,
    ClarityModule,
    ClrFormsModule,
  ],
  exports: [
    ...COMPONENTS,
  ],
  schemas: [
    CUSTOM_ELEMENTS_SCHEMA,
  ],
})
export class UiModule { }
