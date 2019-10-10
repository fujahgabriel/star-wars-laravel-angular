import { Component } from '@angular/core';
import { CharactersService } from './services/characters-service.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'StarWars';
  spinner: boolean;
  peoples = [];
  constructor(private characterService: CharactersService) {
    this.spinner = true;
    this.getCharacters();
  }
  getCharacters() {

    this.characterService.getCharacters()
      .subscribe((res: any) => {
        this.spinner = false;
        this.peoples = res;
        console.log(res);
      }, error => {
        console.error(error);
      });
  }
}
