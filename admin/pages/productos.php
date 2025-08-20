<?php
include("../includes/header.php");
include("../config/conexion.php");

$txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$action = (isset($_POST['accion'])) ? $_POST['accion'] : "";

switch ($action) {
    case "Agregar":
        //echo "Funciona Agregar";
        $sql = "INSERT INTO producto (nombre) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $txtNombre); //Se especifica 1 parámetros string
        $stmt->execute();
        $action = "";
        break;
    case "Seleccionar":
        $sql = "SELECT * FROM producto WHERE  id_producto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $txtId); //Se especifica 1 parámetros string
        $stmt->execute();

        $resultado = $stmt->get_result();
        $producto = $resultado->fetch_assoc();
        $txtNombre = $producto['nombre'];
        break;
    case "Borrar":
        $sql = "UPDATE producto SET estado = 0 WHERE id_producto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $txtId);
        $stmt->execute();
        break;
    default:
        //echo "Se fue para el default";
        break;
}

$sql = "SELECT * FROM producto WHERE estado = 1";
$resultado = $conn->query($sql);
$listaProductos = [];
while ($fila = $resultado->fetch_assoc()) {
    $listaProductos[] = $fila;
}

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del Producto
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtId">ID:</label>
                    <input disabled type="text" class="form-control" name="txtId" id="txtId" value="<?php echo $txtId; ?>" placeholder="Ingresa ID">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input required type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaProductos as $producto) { ?>
                <tr>
                    <td><?php echo $producto['id_producto']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="txtId" id="txtId" value="<?php echo $producto['id_producto']; ?>">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                        </form>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>




<?php
include("../includes/footer.php");
?>