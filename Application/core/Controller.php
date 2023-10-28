<?php

namespace Application\core;

use Application\models\Users;


class Controller
{

  /**
  * @param  string 
  */
  public function model($model)
  {
    require '../Application/models/' . $model . '.php';
    $classe = 'Application\\models\\' . $model;
    return new $classe();

  }

  /**
  * @param  string  $view   
  * @param  array   $data
  */
  public function view(string $view, $data = [])
  {
    require '../Application/views/' . $view . '.php';

  }
  public function pageNotFound()
  {
    $this->view('erro404');
  }
}
