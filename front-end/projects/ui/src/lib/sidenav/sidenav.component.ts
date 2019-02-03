import { Component, Input } from '@angular/core';

import { NavType } from '../models/nav-type';

@Component({
  selector: 'ui-sidenav',
  templateUrl: './sidenav.component.html',
  styleUrls: ['./sidenav.component.scss'],
})
export class SidenavComponent {

  @Input() navLevel = NavType.Sidenav;

  constructor() {
  }

}
