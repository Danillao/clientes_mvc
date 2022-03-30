<?php

class usersController extends Controller
{
  /**
   * 
   */
  public function index()
  {
  }

  /**
   * 
   */
  public function create()
  {
    $data = array(
      'error' => ''
    );

    if (!empty($_GET['error'])) {
      $data['error'] = $_GET['error'];
    }

    $this->loadTemplate('create-user', $data);
  }

  /**
   * 
   */
  public function store()
  {
    $data = array();

    if (!empty($_POST['email'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      $users = new Users();
      if ($users->add($name, $email, $phone)) {

        header("Location: " . BASE_URL);
      } else {
        header("Location: " . BASE_URL . 'users/create?error=exists');
      }
    } else {
      header("Location: " . BASE_URL . 'users/create');
    }
  }

  /**
   * 
   */
  public function edit($id)
  {
    $data = array();

    if (!empty($id)) {
      $users = new Users();

      if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        $users->update($name, $phone, $id);
      } else {
        $data['info'] = $users->findById($id);

        if (isset($data['info']['id'])) {
          $this->loadTemplate('edit-user', $data);
          exit;
        }
      }
    }

    header("Location: " . BASE_URL);
  }


  /**
   * 
   */
  public function destroy($id)
  {
    if (!empty($id)) {
      $users = new Users();
      $users->delete($id);
    }

    header("Location: " . BASE_URL);
  }
}
