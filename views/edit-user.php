<h3>Editar</h3>

<form method="POST">
  <div class="form-group mt-4 mb-4">
    <div class="row d-flex justify-content-center mt-2">
      <div class="col-7">
        <div class="form-outline">
          <label class="form-label" for="name"><b>Nome</b></label>
          <input type="text" name="name" id="name" value="<?= $info['name'] ?>" class="form-control" />
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center mt-2">
      <div class="col-7">
        <div class="form-outline">
          <label class="form-label" for="email"><b>E-Mail</b></label>
          <input type="email" name="email" id="email" class="form-control" disabled="" placeholder="<?= $info['email'] ?>" />
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center mt-2">
      <div class="col-7">
        <div class="form-outline">
          <label class="form-label" for="phone"><b>Telefone</b></label>
          <input type="text" name="phone" id="phone" value="<?= $info['phone'] ?>" class="form-control" />
        </div>
      </div>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-dark btn-block mt-4 mb-4">Editar</button>
</form>