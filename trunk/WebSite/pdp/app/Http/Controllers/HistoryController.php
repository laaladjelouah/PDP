<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\History as history;
use App\users as user;

class HistoryController extends CrudController {

    public function all($entity) {
        parent::all($entity);

        $this->filter = \DataFilter::source(new history());
        $this->filter->add('user_id', 'ID User ', 'text');
        $this->filter->add('bike_id', 'ID Bike ', 'text');

        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);

        //$this->grid->add('lastname', 'Last Name');
        // $this->grid->add('firstname', 'First Name')->style("width:80px");
        $this->grid->add('user_id', 'User ID');
        $this->grid->add('bike_id', 'Bike')->style("width:60px");
        $this->grid->add('active', 'State');
        $this->grid->add('start_borrowing_date', 'Begin borrow', true)->style("width:140px");
        $this->grid->add('end_borrowing_date', 'End borrow')->style("width:140px");
        ;
        $this->grid->add('status_before', 'Status before');
        $this->grid->add('picture_before', 'Picture before')->style("width:70px");
        ;
        $this->grid->add('status_after', 'status after');
        $this->grid->add('picture_after', 'Picture after');

        //ajout des actions sur les enregistrement ('modifier','suprimer')
        $this->addStylesToGrid2();

        //pagination 10 entrée par page
        $this->grid->paginate(10);


        //retourner cette vue
        return $this->returnView();
    }

    //la vue edit, modifiaction,show
    public function edit($entity) {
        parent::edit($entity);

        /* les element de la vue edit de history */

        $this->edit = \DataEdit::source(new history());

        $this->edit->add('users.firstname', 'First Name', 'text');
        $this->edit->add('lastname', 'Last Name', 'text');
        $this->edit->add('user_id', 'ID User', 'text');
        $this->edit->add('bike_id', 'ID Bike', 'text');

        $this->edit->add('status_before', 'state before', 'radiogroup')->option('TREBON',
                'TRES BON')->option('BON', 'BON')->option('MOUEN', 'MOYEN')->option('DIED',
                'DIED');
        //$this->edit->add('status_before', 'Status before','text');
        $this->edit->add('start_borrowing_date', 'Debut emprunt', 'text');
        $this->edit->add('picture_before', 'Photo avant', 'image')->move('uploads/imagesavant/')->preview(200,
                200);

        //$this->edit->add('status_after', 'Status after','text');
        $this->edit->add('status_after', 'state after', 'radiogroup')->option('TRE BON',
                'TRES BON')->option('BON', 'BON')->option('MOYEN', 'MOYEN')->option('DIED',
                'DIED');
        $this->edit->add('end_borrowing_date', 'Fin emprunt', 'text');
        $this->edit->add('picture_after', 'Photo apres', 'image')->move('uploads/imagesapres/')->preview(200,
                200);





        //retourner cette vue
        return $this->returnEditView();
    }

}
