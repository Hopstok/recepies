import { CUSTOM_ELEMENTS_SCHEMA, NgModule} from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ClarityModule, ClrFormsModule } from '@clr/angular';

import { InputComponent } from './input/input.component';
import { UiComponent } from './ui.component';

const COMPONENTS = [
  InputComponent,
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
