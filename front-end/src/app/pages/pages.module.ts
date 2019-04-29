import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

// Auth
import { AuthModule } from '@rock-recipe/pages/auth/auth.module';
import { AuthComponent } from '@rock-recipe/pages/auth/auth/auth.component';
import { HomeComponent } from '@rock-recipe/pages/auth/home/home.component';
import { RecipeComponent } from '@rock-recipe/pages/auth/recipe/recipe.component';
import { SettingsComponent } from '@rock-recipe/pages/auth/settings/settings.component';
import { YourRecipesComponent } from '@rock-recipe/pages/auth/your-recipes/your-recipes.component';

// No Auth
import { LoginComponent } from '@rock-recipe/pages/no-auth/login/login.component';
import { NoAuthModule } from '@rock-recipe/pages/no-auth/no-auth.module';
import { SignupComponent } from '@rock-recipe/pages/no-auth/signup/signup.component';

const routes: Routes = [
  {
    path: '',
    component: AuthComponent,
    children: [
      {
        path: 'home',
        component: HomeComponent,
      },
      {
        path: 'your-recipes',
        component: YourRecipesComponent,
      },
      {
        path: 'recipe/:id',
        component: RecipeComponent,
      },
      {
        path: 'settings',
        component: SettingsComponent,
      },
    ],
  },
  {
    path: 'auth',
    children: [
      {
        path: 'login',
        component: LoginComponent,
      },
      {
        path: 'signup',
        component: SignupComponent,
      },
    ],
  },
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    NoAuthModule,
    AuthModule,
    RouterModule.forChild(routes),
  ],
})
export class PagesModule { }
