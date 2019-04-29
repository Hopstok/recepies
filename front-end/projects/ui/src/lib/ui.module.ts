import { CUSTOM_ELEMENTS_SCHEMA, NgModule} from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {
  ClarityModule,
  ClrFormsModule,
  ClrMainContainerModule,
} from '@clr/angular';

import { ContainerComponent } from './container/container.component';
import { ContentComponent } from './content/content.component';
import { FormComponent } from './form/form.component';
import { HeaderComponent } from './header/header.component';
import { InputPasswordComponent } from './input-password/input-password.component';
import { InputComponent } from './input/input.component';
import { SelectComponent } from './select/select.component';
import { SidenavComponent } from './sidenav/sidenav.component';
import { UiComponent } from './ui.component';

const COMPONENTS = [
  ContainerComponent,
  ContentComponent,
  FormComponent,
  HeaderComponent,
  InputComponent,
  InputPasswordComponent,
  SelectComponent,
  SidenavComponent,
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
    ClrMainContainerModule,
  ],
  exports: [
    ...COMPONENTS,
  ],
  schemas: [
    CUSTOM_ELEMENTS_SCHEMA,
  ],
})
export class UiModule { }
