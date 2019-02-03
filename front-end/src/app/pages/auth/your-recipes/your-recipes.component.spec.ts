import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { YourRecipesComponent } from './your-recipes.component';

describe('YourRecipesComponent', () => {
  let component: YourRecipesComponent;
  let fixture: ComponentFixture<YourRecipesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ YourRecipesComponent ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(YourRecipesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
