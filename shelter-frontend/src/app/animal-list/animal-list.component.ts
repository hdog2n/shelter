import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AnimalService } from '../animal.service';
import { Animal } from '../class/animalClass';
import { Observable } from 'rxjs';
import { AsyncPipe } from '@angular/common';

@Component({
  selector: 'app-animal-list',
  standalone: true,
  imports: [AsyncPipe],
  templateUrl: './animal-list.component.html',
  styleUrl: './animal-list.component.css'
})
export class AnimalListComponent {

  constructor(private router: Router, private animalService: AnimalService) {}

  animals!: Observable<Animal[]>;
  errorMessage = "";

  ngOnInit(): void {
    this.displayAnimals();
    // this.animals = this.animalService.getAnimal() as Observable<Animal[]>; 
    console.log(this.animals)

  }

  displayAnimals() {
    this.animals = this.animalService.getAnimal() as Observable<Animal[]>; 
  }

  goToAnimal() {
    this.router.navigate(['/animal']);
  }

  deleteChosenAnimal(id: number) {
    // this.animals = 
    const sub = this.animalService.deleteAnimal(id).subscribe({
      next: () => {
        this.animals = this.animalService.getAnimal() as Observable<Animal[]>; 
      }, 
      error: (error) => {
        this.errorMessage = error.error;
        sub.unsubscribe();
      }
    });
  }

  updateChosenAnimal(animal: Animal) {
    // this.animalService.putAnimal()
  }
}
