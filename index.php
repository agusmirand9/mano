<?php
require_once 'includes/Producto.php';

$seccion = $_GET['seccion'] ?? 'inicio';


switch ($seccion){
    case 'inicio':
        $vista = 'vistas/inicio.php';
        break;
    case 'tienda':
        $vista = 'vistas/tienda.php';
        break;
    case 'categoria':
        $vista = 'vistas/categoria.php';
        break;
    case 'detalle':
        $vista = 'vistas/detalle.php';
        break;

    default:
    $vista ='vistas/404.php';
        break;
}


require 'includes/header.php';
require $vista;
require 'includes/footer.php';









?>
