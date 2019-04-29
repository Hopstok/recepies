import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';

import { UiModule } from 'projects/ui/src/lib/ui.module';

import { AuthComponent } from '@rock-recipe/pages/auth/auth/auth.component';
import { HomeComponent } from '@rock-recipe/pages/auth/home/home.component';
import { RecipeComponent } from '@rock-recipe/pages/auth/recipe/recipe.component';
import { SettingsComponent } from '@rock-recipe/pages/auth/settings/settings.component';
import { YourRecipesComponent } from '@rock-recipe/pages/auth/your-recipes/your-recipes.component';

@NgModule({
  declarations: [
    AuthComponent,
    HomeComponent,
    RecipeComponent,
    SettingsComponent,
    YourRecipesComponent,
  ],
  imports: [
    CommonModule,
    UiModule,
    RouterModule,
  ],
})
export class AuthModule { }
