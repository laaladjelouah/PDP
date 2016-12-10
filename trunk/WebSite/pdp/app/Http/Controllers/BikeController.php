<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\Bike as Bike;

class BikeController extends CrudController {

    public function all($entity) {
        parent::all($entity);

        /* les filter: contraintes de recherche  de la vue bike/all*/

        $this->filter = \DataFilter::source(new Bike()); //on recupere les donnée a partir du model Bike.php
        //    les champs de recherches de cette vue
        $this->filter->add('id', 'ID', 'text');

        //ajouter les deux bouton recherche et reset
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id', 'ID', true);
        $this->grid->add('reserved', 'reservation');
        $this->grid->add('status', 'state');
        $this->grid->add('photo', 'Photo', 'image');
        $this->grid->add('created_at', 'Created at', 'true');
        $this->grid->add('updated_at', 'Updated at');


//ajouter les actions (show/update/delete)
        $this->addStylesToGrid();

        $this->grid->paginate(10);    //pagination 10 entrée par page


        //afficher la vue
        return $this->returnView();
    }

    public function edit($entity) {

        parent::edit($entity);

        /* les element de la vue edit de bike*/

        $this->edit = \DataEdit::source(new Bike()); ///on utilise le model Bike.php
        $this->edit->label('Bicycle information');

        $this->edit->text('id', 'ID');
        $this->edit->text('Qr_code', 'Qr-Code')->rule('required');

        //$this->edit->text('reserved', 'Reserved');
        $this->edit->text('reserved', 'Reserved', 'radiogroup')->option('OUI',
                'OUI')->option('NON', 'NON');
        $this->edit->add('status', 'state', 'radiogroup')->option('TRE BON',
                'TRES BON')->option('BON', 'BON')->option('MOYEN', 'MOYEN')->option('DIED',
                'DIED');


        //$this->edit->text('status', 'State');

        $this->edit->add('photo', 'Photo', 'image')->move('uploads/images/',
                'id')->preview(200, 200)->rule('required');
        ;






        return $this->returnEditView();
    }

}
