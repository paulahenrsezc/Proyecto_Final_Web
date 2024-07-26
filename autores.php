<?php
require_once 'conexion.php';
include 'consultas.php';

$autores = getAutores();
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
            body {
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 0 auto;
            }
            th, td {
                padding: 20px; 
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
            td.direccion {
                max-width: 300px;
                word-wrap: break-word;
                white-space: normal;
            }
            .masthead {
                text-align: center;
            }
            .navbar-nav {
                margin-left: auto;
            }
        </style>
        
    </head>
    
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
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>Autores</h1>
                            <h2 class="subheading">Navega entre los autores con libros disponibles en esta librería.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-12">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Apellido</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Estado</th>
                                    <th>País</th>
                                    <th>Código Postal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($autores as $autor): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($autor['id_autor']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['apellido']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['telefono']); ?></td>
                                        <td class="direccion"><?php echo htmlspecialchars($autor['direccion']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['ciudad']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['estado']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['pais']); ?></td>
                                        <td><?php echo htmlspecialchars($autor['cod_postal']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </article>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>