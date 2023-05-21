import { Component, OnInit } from '@angular/core';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-gaming',
  templateUrl: './gaming.component.html',
  styleUrls: ['./gaming.component.css']
})
export class GamingComponent implements OnInit {
  map: SafeResourceUrl = '';

  constructor(private sanitizer: DomSanitizer) { }

  ngOnInit() {
    const filePath = 'assets/map/';
    this.map = this.sanitizer.bypassSecurityTrustResourceUrl(filePath);
  }
}
