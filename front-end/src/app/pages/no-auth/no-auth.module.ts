import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';

import { SignupComponent } from '@rock-recipe/pages/no-auth//signup/signup.component';
import { LoginComponent } from '@rock-recipe/pages/no-auth/login/login.component';

@NgModule({
  declarations: [
    LoginComponent,
    SignupComponent,
  ],
  imports: [
    CommonModule,
  ],
})
export class NoAuthModule { }
