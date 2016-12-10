<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use Illuminate\Http\Request;
use App\BikeLock as BikeLock;

class BikeLockController extends CrudController {

    public function all($entity) {
        parent::all($entity);

        $this->filter = \DataFilter::source(new BikeLock()); //utiliser le model BikeLock.php pour le filter
        //definir les champ de recherche propore a cette vue
        $this->filter->add('id', 'ID LOCK ', 'text');
        $this->filter->add('bike_id', 'ID Bike ', 'text');

        //ajouter les deux bouton recherche et reset
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);

//definir les champ a visualiser dans la vue
        $this->grid->add('id', 'ID LOCK');
        $this->grid->add('bike_id', 'ID Bike')->style("width:700px");

        $this->addStylesToGrid();
        $this->grid->paginate(10); //pagination 10 entrée par page


//afficher la vue
        return $this->returnView();
    }


    //la vue edit
    public function edit($entity) {

        parent::edit($entity);
        $this->edit = \DataEdit::source(new BikeLock()); //utilisation du model BikeLock

        $this->edit->label('BIKE LOCK INFORMATION'); //juste un label.

        $this->edit->add('id', 'ID LOCK  :', 'text');
        $this->edit->add('bike_id', 'ID BIKE  :', 'text');




//retourner la vue
        return $this->returnEditView();
    }

}
