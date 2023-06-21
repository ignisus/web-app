import { Component } from '@angular/core';
import { Router } from '@angular/router';

interface Item {
  name: string;
  categories: string[];
  url: string;
}

@Component({
  selector: 'app-market',
  templateUrl: './market.component.html',
  styleUrls: ['./market.component.css'],
})
export class MarketComponent {
  items: Item[] = [
    { name: 'D\'Plata (Av. Ciudad de Chiva, local 25 CC, 41019 Sevilla)', categories: ['all', 'jewelry'], url: 'https://www.google.es/maps/place/D\'Plata/@37.4084853,-5.9223497,17z/data=!4m6!3m5!1s0xd1268cea78dfa21:0x38abc9934281a43c!8m2!3d37.4105349!4d-5.9258473!16s%2Fg%2F11gg9h55n6?entry=ttu' },
    { name: 'Ignisus Clothes', categories: ['all', 'clothing'], url: '/' },
    { name: 'Ignisus Games', categories: ['all', 'games'], url: '/' },
    { name: 'Ignisus FreshFruit', categories: ['all', 'food'], url: '/' },
    { name: 'Ignisus FastFood', categories: ['all', 'food'], url: '/' },
    { name: 'Ignisus Sexshop', categories: ['all', '+18'], url: '/' },
  ];

  filteredItems: Item[] = [];
  searchText: string = '';
  selectedCategories: string[] = [];

  constructor(private router: Router) {
    this.filteredItems = this.items;
  }

  ngOnInit(): void {}

  onItemClick(url: string): void {
    this.router.navigateByUrl(url);
  }

  redirectToUrl(url: string) {
    window.open(url, '_blank');
  }

  filterItems() {
    if (this.selectedCategories.length > 0) {
      this.filteredItems = this.items.filter(item =>
        item.name.toLowerCase().includes(this.searchText.toLowerCase()) &&
        this.selectedCategories.some(category => item.categories.includes(category))
      );
    } else {
      this.filteredItems = this.items.filter(item =>
        item.name.toLowerCase().includes(this.searchText.toLowerCase())
      );
    }
  }

  filterByCategory(category: string) {
    if (this.selectedCategories.includes(category)) {
      this.selectedCategories = this.selectedCategories.filter(cat => cat !== category);
    } else {
      this.selectedCategories.push(category);
    }
    this.filterItems();
  }

  searchItems() {
    this.filterItems();
  }

  isCategoryActive(category: string): boolean {
    return this.selectedCategories.includes(category);
  }

  
}