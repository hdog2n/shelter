import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AnimalService } from '../animal.service';
import { Animal } from '../class/animalClass';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-animal',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './animal.component.html',
  styleUrl: './animal.component.css'
})
export class AnimalComponent {

  constructor(private router: Router, private animalService: AnimalService) {}

  errorMessage = "";

  animalToAdd : Animal = {
    Id_Animal: 0,
    birthdate: '',
    animal_name: '',
    Id_race: 1,
    Id_Person: null,
    race_name: null
  }
  
  addAnimal() {
    const sub = this.animalService.postAnimal(this.animalToAdd).subscribe({
      next: (animalAdded) => {
        console.log(this.animalToAdd);
        console.log("aaa",animalAdded);
        this.router.navigate(["animal-list"]);
        sub.unsubscribe();
      }, 
      error: (error) => {
        this.errorMessage = error.error.error;
        sub.unsubscribe();
      }
    })
  }

  goToAnimalList() {
    this.router.navigate(['/animal-list']);
  }
}
