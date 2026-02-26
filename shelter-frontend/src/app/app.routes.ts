import { Routes } from '@angular/router';
import { AnimalComponent } from './animal/animal.component';
import { AnimalListComponent } from './animal-list/animal-list.component';

export const routes: Routes = [
    {path: '', redirectTo: 'animal-list', pathMatch: "full"},
    {path: 'animal', component: AnimalComponent},
    {path: 'animal-list', component: AnimalListComponent}
];
