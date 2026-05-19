<?php
class Producto {

private int $id;
private string $nombre;
private string $categoria;
private string $descripcion;
private float $precio;
private bool $destacado;
private string $imagen;


public function __construct(array $data)
{
    $this->id = $data['id'];
    $this->nombre = $data['nombre'];
    $this->categoria = $data['categoria'];
    $this->descripcion = $data['descripcion'];
    $this->precio = $data['precio'];
    $this->destacado = $data['destacado'];
    $this->imagen = $data['imagen'];

}

public function getId(): int { return $this->id;}
public function getNombre(): string {return $this->nombre;}
public function getCategoria(): string {return $this->categoria;}
public function getDescripcion(): string {return $this->descripcion;}
public function getPrecio(): float {return $this->precio;}
public function isDestacado(): bool {return $this->destacado;}
public function getImagen(): string {return $this->imagen;}



public function getPrecioFormateado(): string{
    return '$'. number_format($this->precio, 0, ',', '.');
}

public function getImagenSrc(): string{
    return 'assets/img/productos/' . $this->imagen;
}

public function enStock(): bool{
    return $this->stock > 0;
}



public static function obtenerTodos(): array{
    $json = file_get_contents(__DIR__ . '/../data/productos.json');
    
    $datos = json_decode($json, true);

    $productos = [];
    foreach($datos as $dato){
        $productos[] = new Producto($dato);
    }

    return $productos;
}


public static function buscarPorId(int $id): ?Producto {
    $productos = self :: obtenerTodos();

    foreach($productos as $producto){
        if($producto->getId() == $id){
            return $producto;
        }
    }

    return null;


}

public static function filtrarPorCategoria(string $categoria): array{
    $productos = self:: obtenerTodos();
    $resultado = [];

    foreach($productos as $producto){
        if($producto->getCategoria() == $categoria){
            $resultado[] = $producto;
        }
    }
    return $resultado;

}


public static function obtenerDestacados(): array{
    $productos = self :: obtenerTodos();
    $resultado = [];

    foreach($productos as $producto){
        if($producto->isDestacado() == true){
        $resultado[] = $producto;
        }
    }
    return $resultado;
}

public static function obtenerCategorias(): array{
    $productos =self::obtenerTodos();
    $categorias = [];

    foreach($productos as $producto) {
        if (!in_array($producto->getCategoria(), $categorias)) {
            $categorias[] = $producto->getCategoria();
        } 
    }
    return $categorias;
} 




}


?>
