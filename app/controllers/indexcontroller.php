<?php

namespace FR_MO\Controllers;
use FR_MO\Models\ClassesModel;

class IndexController extends AppController{

    public function defaultMethod(){
      $this->_data['allNumber'] = ClassesModel::getMainNum();
      $this->setView();
    }

}