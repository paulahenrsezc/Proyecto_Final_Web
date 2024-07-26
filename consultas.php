<?php

function getLibros() {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "SELECT * FROM titulos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAutores() {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "SELECT * FROM autores";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getContactos() {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "SELECT * FROM contactos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertarContacto($nombre, $correo, $asunto, $comentario) {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "INSERT INTO contactos (fecha, correo, nombre, asunto, comentario) VALUES (NOW(), ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$correo, $nombre, $asunto, $comentario]);
}

function borrarContacto($id) {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "DELETE FROM contactos WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

function actualizarContacto($id, $nombre, $correo, $asunto, $comentario) {
    $conexion = new Conexion();
    $pdo = $conexion->getPdo();

    $sql = "UPDATE contactos SET nombre = ?, correo = ?, asunto = ?, comentario = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $correo, $asunto, $comentario, $id]);
}

?>