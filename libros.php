<?php
require_once 'conexion.php';
include 'consultas.php';

$libros = getLibros();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Proyecto final - Paula Henrsez</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .masthead {
            width: 100%; 
            background-size: cover;
            background-position: center;
            padding: 50px 0; 
            box-sizing: border-box; 
            position: relative;
        }
        .navbar {
            width: 100%; 
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .navbar-nav {
            margin-left: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #fff8e1;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        td.notas {
            max-width: 700px; 
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
    
</head>
    
<body>
    <header class="masthead" style="background-image: url('assets/img/about-bg.jpg');">
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
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Libros</h1>
                        <span class="subheading">Navega entre los libros que tenemos disponibles.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="mb-4">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <hr class="my-4" />
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Tipo</th>
                                <th>ID Publicador</th>
                                <th>Precio</th>
                                <th>Avance</th>
                                <th>Total Ventas</th>
                                <th class="notas">Notas</th>
                                <th>Fecha Publicación</th>
                                <th>Contrato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($libros as $libro): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($libro['id_titulo']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['tipo']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['id_pub']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['precio']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['avance']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['total_ventas']); ?></td>
                                    <td class="notas"><?php echo htmlspecialchars($libro['notas']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['fecha_pub']); ?></td>
                                    <td><?php echo htmlspecialchars($libro['contrato']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>