import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainComponent } from './main/main.component';
import { ForumComponent } from './forum/forum.component';
import { GamingComponent } from './gaming/gaming.component';
import { MarketComponent } from './market/market.component';

const routes: Routes = [
  { path: '', component: MainComponent },
  { path: 'forum', component: ForumComponent },
  { path: 'gaming', component: GamingComponent },
  { path: 'market', component: MarketComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
