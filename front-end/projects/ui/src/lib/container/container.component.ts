import { Component, Input } from '@angular/core';

import { NavType } from '../models/nav-type';

@Component({
  selector: 'ui-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.scss'],
})
export class ContainerComponent {

  @Input() headerNavLevel = NavType.Header;

  constructor(
  ) {
  }

}
