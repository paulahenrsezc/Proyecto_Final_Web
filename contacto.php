<?php
require_once 'conexion.php';
include 'consultas.php';
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['insertar'])) {
        
        if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['asunto']) && !empty($_POST['comentario'])) {
            insertarContacto($_POST['nombre'], $_POST['correo'], $_POST['asunto'], $_POST['comentario']);
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Comentario agregado exitosamente.'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Todos los campos son requeridos.'];
        }
    } elseif (isset($_POST['editar'])) {
        
        if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['asunto']) && !empty($_POST['comentario'])) {
            actualizarContacto($_POST['id'], $_POST['nombre'], $_POST['correo'], $_POST['asunto'], $_POST['comentario']);
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Comentario editado exitosamente.'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Todos los campos son requeridos.'];
        }
    }
} elseif (isset($_GET['borrar'])) {
    borrarContacto($_GET['borrar']);
    $_SESSION['message'] = ['type' => 'success', 'text' => 'Comentario eliminado exitosamente.'];
}

$contactos = getContactos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Proyecto final - Paula Henrsez</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .comentario-cell {
            word-wrap: break-word;
            white-space: pre-wrap;
            max-width: 300px; 
            overflow-wrap: break-word; 
        }
    </style>
</head
    
<body>
    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="libros.php">Ver los libros</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="autores.php">Ver los autores</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contacto.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contáctanos</h1>
                        <span class="subheading">Llena el formulario y envía.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo htmlspecialchars($_SESSION['message']['type']); ?> alert-dismissible fade show" role="alert">
                            <?php echo htmlspecialchars($_SESSION['message']['text']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    <p>¿Tienes algún comentario o pregunta sobre los libros o autores? No dudes en contactarte con nosotros.</p>
                    <div class="my-5">
                        <form id="contactForm" method="post" action="">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-floating">
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required />
                                <label for="nombre">Nombre</label>
                                <div class="invalid-feedback">El nombre es requerido.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="correo" name="correo" type="email" placeholder="Correo" required />
                                <label for="correo">Correo electrónico</label>
                                <div class="invalid-feedback">El correo es requerido y debe ser válido.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="asunto" name="asunto" type="text" placeholder="Asunto" required />
                                <label for="asunto">Asunto</label>
                                <div class="invalid-feedback">El asunto es requerido.</div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="comentario" name="comentario" style="height: 12rem" placeholder="Comentario" required></textarea>
                                <label for="comentario">Comentario</label>
                                <div class="invalid-feedback">El comentario es requerido.</div>
                            </div>
                            <br />
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-primary text-uppercase" id="submitButton" name="insertar" type="submit">Enviar</button>
                                <button class="btn btn-primary text-uppercase" id="editarButton" name="editar" type="submit" style="display: none;">Editar</button>
                                <button class="btn btn-primary text-uppercase" id="cancelButton" type="button" style="display: none;" onclick="cancelEdit()">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
                        <hr class="my-4" />
                        <h3>Sección de Comentarios</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col">Editar/Eliminar comentario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contactos as $contacto): ?>
                                    <tr>
                                        <th scope="row"><?php echo htmlspecialchars($contacto['id']); ?></th>
                                        <td><?php echo htmlspecialchars($contacto['fecha']); ?></td>
                                        <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($contacto['correo']); ?></td>
                                        <td><?php echo htmlspecialchars($contacto['asunto']); ?></td>
                                        <td class="comentario-cell"><?php echo nl2br(htmlspecialchars($contacto['comentario'])); ?></td>
                                        <td>
                                            <a href="javascript:editContact(<?php echo htmlspecialchars($contacto['id']); ?>, '<?php echo htmlspecialchars($contacto['nombre']); ?>', '<?php echo htmlspecialchars($contacto['correo']); ?>', '<?php echo htmlspecialchars($contacto['asunto']); ?>', '<?php echo htmlspecialchars($contacto['comentario']); ?>')" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="?borrar=<?php echo htmlspecialchars($contacto['id']); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </main>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    
    <script>
        function editContact(id, nombre, correo, asunto, comentario) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('correo').value = correo;
            document.getElementById('asunto').value = asunto;
            document.getElementById('comentario').value = comentario;

            document.getElementById('submitButton').style.display = 'none';
            document.getElementById('editarButton').style.display = 'inline-block';
            document.getElementById('cancelButton').style.display = 'inline-block';
            document.querySelector('#contactForm').scrollIntoView({ behavior: 'smooth' });
        }

        function cancelEdit() {
            document.getElementById('id').value = '';
            document.getElementById('nombre').value = '';
            document.getElementById('correo').value = '';
            document.getElementById('asunto').value = '';
            document.getElementById('comentario').value = '';

            document.getElementById('submitButton').style.display = 'inline-block';
            document.getElementById('editarButton').style.display = 'none';
            document.getElementById('cancelButton').style.display = 'none';
        }
    </script>
    
</body>
</html>