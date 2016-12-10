<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\users as users;

class usersController extends CrudController {

    public function all($entity) {
        parent::all($entity);

        /**  */
        //$this->filter->label('Users');

        $this->filter = \DataFilter::source(new users()); //utilistation du model users.php
        $this->filter->add('id', 'ID USER', 'text');
        $this->filter->add('lastname', 'Last Name', 'text')->options(users::lists("lastname","id")->all()); //
        $this->filter->add('firstname', 'Firts Name', 'text');

        //ajout des deux bouton recherche et reset
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);

        //definir les champ a aparaitre dans la vue.
        $this->grid->add('lastname', 'Name', true);
        $this->grid->orderBy('lastname', 'desc'); // ordre descendant lastname
        $this->grid->add('firstname', 'Firstname', true); //ajout de l'option de réorganisation : les deux fleche
        $this->grid->add('phoneNumber', 'Mobile');
        $this->grid->add('email', 'Email');
        $this->grid->add('created_at', 'Member sinse', true);
        $this->grid->add('blacklisted', 'Blacklisted', true);
        $this->grid->add('credit', 'Credit', true);

        //definir show comme action pour cette vue
        $this->addStylesToGrid3();
        $this->grid->paginate(10); //pagination 10 entrée par page

        //retourner cette vue
        return $this->returnView();
    }


    //la fonction qui cree la vue edit de user
    public function edit($entity) {

        parent::edit($entity);

        $this->edit = \DataEdit::source(new users());

        $this->edit->label('Users information');   //juste un label
        $this->edit->add('lastname', 'Name  :', 'text');
        $this->edit->add('firstname', 'Firstname  :', 'text');
        $this->edit->add('email', 'Email  :', 'text');
        $this->edit->add('phoneNumber', 'Mobile  :', 'text');
        $this->edit->add('credit', 'Crédit  :', 'text');

        $this->edit->add('blacklisted', 'Blackliste  :', 'radiogroup')->option('OUI',
                'OUI')->option('NON', 'NON');
        $this->edit->add('created_at', 'Member sinse  :', 'text');

        //retourner la vue edit
        return $this->returnEditView();
    }

}
