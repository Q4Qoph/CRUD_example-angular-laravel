import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { NewArticleComponent } from './new-article/new-article.component';
import { EditArticleComponent } from './edit-article/edit-article.component';

const routes: Routes = [
  {
    path:'add', component:NewArticleComponent
  }, 
  {
    path:'edit/:articleId',component:EditArticleComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
