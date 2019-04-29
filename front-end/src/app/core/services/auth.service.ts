import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

import { User } from '@src/backend-connector';

@Injectable({
  providedIn: 'root',
})
export class AuthService {

  private readonly userSource$ = new BehaviorSubject<User | undefined>(undefined);
  readonly user$ = this.userSource$.asObservable();

  constructor() {
  }

  login() {
    // TODO: Add real API implementation
    return Promise.resolve();
  }

  logout() {
    // TODO: Add real API implementation
    return Promise.resolve();
  }

}
