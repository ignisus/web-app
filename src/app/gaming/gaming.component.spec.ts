import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GamingComponent } from './gaming.component';

describe('GamingComponent', () => {
  let component: GamingComponent;
  let fixture: ComponentFixture<GamingComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GamingComponent]
    });
    fixture = TestBed.createComponent(GamingComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
