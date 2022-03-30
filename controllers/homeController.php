<?php

class homeController extends Controller
{
  /**
   * 
   */
  public function index()
  {

    $user = new Users();

    $data = array();

    $data['list'] = $user->getAll();

    $this->loadTemplate('home', $data);
  }
}
