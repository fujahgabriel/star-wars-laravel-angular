import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Injectable({
  providedIn: 'root'
})
export class CharactersService {
  private baseUrl = 'http://127.0.0.1:8000/api/characters';
  constructor(private http: HttpClient) { }
  getCharacters() {
    return this.http.get(this.baseUrl);
  }
}
