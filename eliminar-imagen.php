<?php
session_start();
require "./controllers/posts.php";

if (isset($_GET['id_imagen'])) {
    $imageId = $_GET['id_imagen'];

    // Obtener información de la imagen
    $conn = mysqli_connect("192.168.12.40", "XDD", "XDD", "galeria");
    $query = "SELECT * FROM imagenes_sueltas WHERE id_imagen = $imageId";
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);

    if ($post) {
        // Eliminar la imagen del sistema de archivos
        $imagesName = explode(",", $post['imagen']);
        foreach ($imagesName as $imageNameToDelete) {
            $imagePath = "./assets/images/posts/" . $imageNameToDelete;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Eliminar la entrada de la base de datos
        $deleteQuery = "DELETE FROM imagenes_sueltas WHERE id_imagen = $imageId";
        mysqli_query($conn, $deleteQuery);

        $_SESSION['success'] = "Imagen eliminada exitosamente.";
    } else {
        $_SESSION['error'] = "No se encontró la imagen.";
    }
} else {
    $_SESSION['error'] = "Error al eliminar la imagen.";
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
