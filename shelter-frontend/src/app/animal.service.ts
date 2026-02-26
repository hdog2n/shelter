import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Animal } from './class/animalClass';

@Injectable({
  providedIn: 'root'
})
export class AnimalService {

  constructor(private http: HttpClient) { }

  backendurl: string = "http://localhost/shelter/shelter-backend/animal.php";

  getAnimal() : Observable<Animal[] | Animal> {
    return this.http.get<Animal[]>(this.backendurl);
  }

  postAnimal(animal: Animal) : Observable<Animal> {
    return this.http.post<Animal>(this.backendurl, animal);
  }

  putAnimal(animalToUpdate: Animal) : Observable<Animal> {
    return this.http.put<Animal>(this.backendurl, animalToUpdate);
  }

  deleteAnimal(idAnimal: number): Observable<any> { //any ?
    return this.http.delete<any>(this.backendurl+"?id="+idAnimal);
  }
  // deleteAnimal(idAnimal: number): Observable<any> { //any ?
  //   return this.http.delete<any>(this.backendurl, idAnimal);
  // }
}
