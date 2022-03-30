<?php

class Users extends Model
{

  /**
   * Verifica Duplicidade pelo do Id
   * 
   * @param Int $id
   * @return Boolean
   */
  private function checkById($id): bool
  {
    $sql = "SELECT * FROM users WHERE id = :id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Verifica Duplicidade pelo do Email
   * 
   * @param String $email
   * @return Boolean
   */
  private function checkByEmail($email): bool
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }


  /**
   * Recupera todos os Usuarios 
   * 
   * @param void
   * @return Array
   */
  public function getAll(): array
  {
    $array = array();

    $sql = "SELECT * FROM users";
    $sql = $this->pdo->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    return $array;
  }


  /**
   * Recupera Usuario pelo do Id
   * 
   * @param Int $id
   * @return Array
   */
  public function findById($id): array
  {
    $array = array();

    if ($this->checkById($id)) {
      $sql = "SELECT * FROM users WHERE id = :id";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute();

      if ($sql->rowCount() > 0) {
        $array = $sql->fetch();
      }
    }

    return $array;
  }


  /**
   * Insere Usuario no BD
   * 
   * @param String $name, $email, $phone
   * @return Boolean
   */
  public function add($name, $email, $phone): bool
  {
    if (!$this->checkByEmail($email)) {
      $sql = "INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":name", $name);
      $sql->bindValue(":email", $email);
      $sql->bindValue(":phone", $phone);
      $sql->execute();

      return true;
    } else {
      return false;
    }
  }


  /**
   * Atualiza Usuario no BD
   * 
   * @param String $name, $phone, $id
   * @return void
   */
  public function update($name, $phone, $id): void
  {
    if ($this->checkById($id)) {
      $sql = "UPDATE users SET name=:name, phone=:phone WHERE id=:id";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":name", $name);
      $sql->bindValue(":phone", $phone);
      $sql->bindValue(":id", $id);
      $sql->execute();
    }
  }


  /**
   * Deleta Usuario no BD
   * 
   * @param Int $id
   * @return void
   */
  public function delete($id): void
  {
    if ($this->checkById($id)) {
      $sql = "DELETE FROM users WHERE id = :id";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute();
    }
  }
}
