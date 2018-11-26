import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

// FIXME: Cannot use `@ui` for this: https://github.com/angular/vscode-ng-language-service/issues/79
import { UiModule } from '../../projects/ui/src/lib/ui.module';

import { AppRoutingModule } from '@rock-recipe/app-routing.module';
import { AppComponent } from '@rock-recipe/app.component';

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    UiModule,
    AppRoutingModule,
  ],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule { }
