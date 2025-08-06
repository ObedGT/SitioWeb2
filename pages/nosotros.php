<?php
include('../includes/header.php');
//b4-card-default
//b4-grid-col
?>

<div class="col-md-5">
    <div class="jumbotron">
        <h1 class="display-3">Nosotros</h1>
        <p class="lead">Somos un grupo de desarrollo <i class="fa fa-weibo" aria-hidden="true"></i></p>
        <hr class="my-2">
        <p>Más información</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Contacto</a>
        </p>
    </div>
</div>

<div class="col-md-7">
    <form>
    <div class = "form-group">
    <label for="exampleInputEmail1">Correo Electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Mensaje</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mensaje">
    </div>
    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Quíero recibir información vía Correo</label>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    
    
</div>

<?php
include('../includes/footer.php');
//b4-card-default
?>