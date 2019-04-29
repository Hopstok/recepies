import { Component, Input } from '@angular/core';

@Component({
  selector: 'ui-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})
export class HeaderComponent {

  @Input() level = 1;

  constructor() {
  }

}
