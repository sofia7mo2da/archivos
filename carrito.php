<?php
session_start();
$idrol = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null; // Corrige a 'user_role'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisomi Librería Escolar - Carrito de Compras</title>
    <link rel="shortcut icon"  href="img/logo.jpg">
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="top-bar">
        <div class="container">
            <p>📦 Envíos a domicilios 🏠 🛵</p>
        </div>
    </div>

    <!-- Encabezado principal -->
    <header class="main-header">
        <div class="container">
            <div class="header-left">
                <a href="#">
                    <img src="img/Logotipo.png" class="logo">
            </div>
            <div class="search-container">
            <form action="buscar.php" method="GET">
                <input type="text" placeholder="¿Qué estás buscando?" class="search-input" name="search">
                <button class="search-button" type="submit">Buscar</button>
            </form>
        </div>
            <br>
            <div class="header-right">
                <div class="menu-ayuda">
                    <a href="#" class="header-link"><i class="fas fa-question-circle"></i> Ayuda</a>
                    <div class="contenido-ayuda">
                        <a href="https://wa.me/543795003045?text=Más%20información%20sobre%20los%20productos."><i class="fab fa-whatsapp"></i> +543795003045</a><br>
                        <a href="mailto:info@libreriaenjoy.com.ar"><i class="fas fa-envelope"></i> info@libreria_kisomi.com.ar</a>
                    </div>
                </div>
                <div class="menu-cuenta">
                    <a href="#" class="header-link" id="botonCuenta"><i class="fas fa-user-circle"></i> Mi cuenta</a>
                    <div class="contenido-cuenta" id="menuCuentaDesplegable">
                        <p>
                            <a href="registrarse.php">
                                <i class="fas fa-user-plus"></i> Registrarse
                            </a>
                        </p>
                        <p>
                            <a href="iniciar_sesion.php">
                                <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                            </a>
                        </p>
                    </div>
                    <div class="cart-dropdown">
                <a href="carrito.php" class="header-link">
                    <i class="fas fa-shopping-cart"></i>Mi Carrito (0)</button></a>
                </a>
                <div id="cart-items" class="cart-items">
        <!-- Aquí se mostrarán los productos añadidos al carrito -->
    </div>
</div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </header>

    <!-- Menú de navegación -->
    <nav class="nav-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Inicio</a></li><br>
                <li><a href="productos.php">Productos</a></li><br>
                <li class="dropdown">
                    <a href="#">Categorías</a>
                    <div class="dropdown-content">
                        <div class="column">
                            <a href="#">Agendas</a>
                            <a href="#">Archivadores</a>
                            <a href="#">Aros</a>
                            <a href="#">Borradores</a>
                            <a href="#">Biromes</a>
                            <a href="#">Blocks</a>
                            <a href="#">Correctores</a>
                            <a href="#">Calculadoras</a>
                            <a href="#">Carpetas</a>
                            <a href="#">Cuadernos</a>
                        </div>
                        <div class="column">
                            <a href="#">Cartucheras</a>
                            <a href="#">Clips</a>
                            <a href="#">Compases</a>
                            <a href="#">Grapadoras</a>
                            <a href="#">Lapices</a>
                            <a href="#">Libretas</a>
                            <a href="#">Marcadores</a>
                            <a href="#">Mochilas</a>
                            <a href="#">Pegamento</a>
                            <a href="#">Post-it</a>
                        </div>
                        <div class="column">
                            <a href="#">Reglas</a>
                            <a href="#">Resaltadores</a>
                            <a href="#">Tempera</a>
                            <a href="#">Tijeras</a>
                            <a href="#">Sacapuntas</a>   
                        </div>
                </li><br>
                <li><a href="promociones.php">Promociones</a></li><br>
                <li><a href="contacto.php">Contacto</a></li><br>
            </ul>
        </div>
        <script>
            document.querySelector('.dropdown-toggle').addEventListener('click', function (e) {
                e.preventDefault();
                var dropdownMenu = document.querySelector('.dropdown-menu');
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            });
        
            // Cerrar el menú si haces clic fuera de él
            window.addEventListener('click', function(e) {
                var dropdownMenu = document.querySelector('.dropdown-menu');
                if (!e.target.matches('.dropdown-toggle')) {
                    dropdownMenu.style.display = 'none';
                }
            });
        </script>
    </nav>
    <br>

    <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los productos en el carrito
$queryCarrito = "
    SELECT c.IDCarrito, p.Nombre, c.Cantidad, c.SubTotal, p.IDProducto, i.URL_Imagen
    FROM carrito c
    INNER JOIN producto p ON c.IDProducto = p.IDProducto
    LEFT JOIN imagenes_producto i ON p.IDProducto = i.IDProducto
    WHERE c.Estado = 'Activo'
";
$result = $conexion->query($queryCarrito);

// Verificar si hay productos en el carrito
$hayProductos = $result->num_rows > 0;
?>
<div class="cart-container">
    <h2>Carrito de Compras</h2>

    <?php if ($hayProductos): ?>
        <!-- Mostrar el botón "Vaciar Carrito" y "Realizar Compra" solo si hay productos -->
        <button class="empty-cart-button" onclick="vaciarCarrito()">Vaciar Carrito</button>
        <a href="realizar_compra.php" class="btn btn-primary">Realizar Compra</a>
    <?php else: ?>
        <!-- Mensaje cuando el carrito está vacío -->
        <p>Tu carrito está vacío.</p>
        <a href="productos.php" class="btn btn-primary">Agregar al Carrito</a>
    <?php endif; ?>

    <div class="cart-items">
        <?php while ($item = $result->fetch_assoc()) : ?>
            <div class="cart-item-card">
                <img src="<?php echo $item['URL_Imagen'] ? $item['URL_Imagen'] : 'img/default.jpg'; ?>" alt="<?php echo htmlspecialchars($item['Nombre']); ?>" class="cart-item-image">
                <div class="cart-item-info">
                    <h3><?php echo htmlspecialchars($item['Nombre']); ?></h3>
                    <p>Subtotal: $<?php echo number_format($item['SubTotal'], 2); ?></p>
                    <input type="number" min="1" value="<?php echo htmlspecialchars($item['Cantidad']); ?>" class="quantity-input" id="cantidad-<?php echo $item['IDCarrito']; ?>">
                </div>
                <div class="cart-item-actions">
                    <button onclick="actualizarCarrito(<?php echo $item['IDCarrito']; ?>)">Actualizar</button>
                    <button onclick="eliminarDelCarrito(<?php echo $item['IDCarrito']; ?>)">Eliminar</button>
                </div>
            </div><br>
        <?php endwhile; ?>
    </div>
</div>

<script>
// Función para vaciar el carrito
function vaciarCarrito() {
    fetch('vaciar_carrito.php', {
        method: 'POST'
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload(); // Recargar la página
    })
    .catch(error => console.error('Error:', error));
}

// Función para realizar la compra
function realizarCompra() {
    fetch('realizar_compra.php', {
        method: 'POST'
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload(); // Recargar para ver el cambio
    })
    .catch(error => console.error('Error:', error));
}

// Función para actualizar la cantidad de un producto en el carrito
function actualizarCarrito(idCarrito) {
    const cantidad = document.getElementById(`cantidad-${idCarrito}`).value;

    fetch('actualizar_al_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `IDCarrito=${idCarrito}&Cantidad=${cantidad}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload(); // Recargar para ver los cambios
    })
    .catch(error => console.error('Error:', error));
}

// Función para eliminar un producto del carrito
function eliminarDelCarrito(idCarrito) {
    fetch('eliminar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `IDCarrito=${idCarrito}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        location.reload(); // Recargar para ver los cambios
    })
    .catch(error => console.error('Error:', error));
}
</script>
</body>
</html>
 
</div class="whatsapp">
<a href="https://wa.me/543795003045?text=Más%20información%20sobre%20los%20productos." target="_blank" class="whatsapp-button">
    <img src="img/Imagen de WhatsApp.jpg" alt="WhatsApp" />
  </a>

<!-- pie de pagina-->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section about">
            <h2>Sobre Nosotros</h2>
            <p>Somos una librería escolar dedicada a ofrecer productos de alta calidad a precios accesibles, ayudando a estudiantes y familias a prepararse para el éxito académico.</p><br>
            <p>&copy; 2024 Librería Escolar. Todos los derechos reservados.</p>
        </div>

        <div class="footer-section links">
            <h2>Enlaces Rápidos</h2>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="productos.html">Producto</a></li>
                <li><a href="categorias.html">Categorías</a></li>
                <li><a href="promociones.html">Promociones</a></li>
                <li><a href="contacto.html">Contáctanos</a></li>
            </ul>
        </div>

        <div class="footer-section payment">
            <h2>Medios de Pago</h2>
            <p>Aceptamos las siguientes formas de pago:</p>
            <ul>
                <li><i class="fas fa-credit-card"></i> Tarjetas de crédito y débito</li>
                <li><i class="fas fa-money-bill-alt"></i> Transferencias bancarias</li>
                <li><i class="fas fa-wallet"></i> Efectivo en tienda</li>
                <li><i class="fas fa-mobile-alt"></i> Pago por aplicaciones móviles</li>
            </ul>
        </div>


        <div class="footer-section delivery">
            <h2>Delivery</h2>
            <p>Ofrecemos servicio de entrega a domicilio dentro de Corrientes. También puedes retirar tu pedido en nuestra Libreria.🛵</p>
        </div>

        <div class="footer-section contact">
            <h2>Contáctanos</h2>
            <p><i class="fas fa-map-marker-alt"></i> Calle Falsa 123, Corrientes, Argentina</p>
            <p><i class="fas fa-phone-alt"></i> +54 3795003045</p>
            <p><i class="fas fa-envelope"></i>info@libreriaescolar.com</p>
        </div>

        <div class="footer-section social">
            <h2>Síguenos</h2>
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/kisomi_libreria/profilecard/?igsh=MTVra2t0aXY3djJsZQ=="><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/543795003045?text=Más%20información%20sobre%20los%20productos."><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</footer>