<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kisomi Librería Escolar - Productos</title>
<link rel="shortcut icon"  href="img/logo.jpg">
<link rel="stylesheet" href="styles.css"> 
<link rel="javascript" href="javascript.js"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div>
<div class="top-bar">
    <div class="container">
        <p>📦 Envíos a domicilios 🏠 🛵</p>
    </div>
</div>

   
<!-- Encabezado principal -->
<header class="main-header">
    <div class="container">
        <!-- Logo -->
        <div class="header-left">
            <a href="#">
                <img src="img/Logotipo.png" class="logo" alt="Logo">
            </a>
        </div>

        <!-- Barra de búsqueda -->
        <div class="search-container">
            <form action="" method="GET"> <!-- Enviar al mismo archivo -->
                <input type="text" placeholder="¿Qué estás buscando?" class="search-input" name="search">
                <button class="search-button" type="submit">Buscar</button>
            </form>
        </div>

        <!-- Menú de usuario y carrito -->
        <div class="header-right">
            <!-- Ayuda -->
            <div class="menu-ayuda">
                <a href="#" class="header-link"><i class="fas fa-question-circle"></i> Ayuda</a>
                <div class="contenido-ayuda">
                    <a href="https://wa.me/543795003045?text=Más%20información%20sobre%20los%20productos."><i class="fab fa-whatsapp"></i> +543795003045</a><br>
                    <a href="mailto:info@libreriaenjoy.com.ar"><i class="fas fa-envelope"></i> info@libreria_kisomi.com.ar</a>
                </div>
            </div>

            <!-- Cuenta de usuario -->
            <div class="menu-cuenta">
                <a href="#" class="header-link" id="botonCuenta"><i class="fas fa-user-circle"></i> Mi cuenta</a>
                <div class="contenido-cuenta" id="menuCuentaDesplegable">
                    <p><a href="registrarse.php"><i class="fas fa-user-plus"></i> Registrarse</a></p>
                    <p><a href="iniciar_sesion.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a></p>
                </div>
            </div>

            <div class="cart-dropdown">
                <a href="carrito.php" class="header-link">
                    <i class="fas fa-shopping-cart"></i>Mi Carrito</button></a>
                </a>
                <div id="cart-items" class="cart-items">
        <!-- Aquí se mostrarán los productos añadidos al carrito -->
    </div>
</div>
<script>
function añadirAlCarrito(idProducto) {
    const cantidad = document.getElementById(`cantidad-${idProducto}`).value;

    fetch('agregar_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `IDProducto=${idProducto}&Cantidad=${cantidad}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar el contador del carrito y los productos listados en el desplegable
            document.getElementById('cart-count').innerText = data.cartCount;
            actualizarCarritoDropdown();
            alert('Producto añadido al carrito');
        } else {
            alert('Error al agregar el producto al carrito');
        }
    })
    .catch(error => console.error('Error:', error));
}

function actualizarCarritoDropdown() {
    fetch('obtener_carrito.php')
    .then(response => response.json())
    .then(data => {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = '';
        data.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <p>${item.Nombre} x${item.Cantidad}</p>
                <p>Precio: $${item.SubTotal.toFixed(2)}</p>
            `;
            cartItemsContainer.appendChild(itemElement);
        });
    })
    .catch(error => console.error('Error:', error));
}
</script>
                </div>
            </div>
        </div>
    </div>
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
                            <a href="productos.php?categoria=Agendas">Agendas</a>
                            <a href="productos.php?categoria=Archivadores">Archivadores</a>
                            <a href="productos.php?categoria=Aros">Aros</a>
                            <a href="productos.php?categoria=Borradores">Borradores</a>
                            <a href="productos.php?categoria=Biromes">Biromes</a>
                            <a href="productos.php?categoria=Blocks">Blocks</a>
                            <a href="productos.php?categoria=Correctores">Correctores</a>
                            <a href="productos.php?categoria=Calculadora">Calculadora</a>
                            <a href="productos.php?categoria=Carpetas">Carpetas</a>
                            <a href="productos.php?categoria=Cuadernos">Cuadernos</a>
                        </div>
                        <div class="column">
                            <a href="productos.php?categoria=Cartucheras">Cartucheras</a>
                            <a href="productos.php?categoria=Clips">Clips</a>
                            <a href="productos.php?categoria=Compases">Compases</a>
                            <a href="productos.php?categoria=Grapadoras">Grapadoras</a>
                            <a href="productos.php?categoria=Lápices">Lapices</a>
                            <a href="productos.php?categoria=Libretas">Libretas</a>
                            <a href="productos.php?categoria=Marcadores">Marcadores</a>
                            <a href="productos.php?categoria=Mochilas">Mochila</a>
                            <a href="productos.php?categoria=Pegamento">Pegamento</a>
                            <a href="productos.php?categoria=Post-it">Post-it</a>
                            <a href="productos.php?categoria=Pincel">Pincel</a>
                        </div>
                        <div class="column">
                            <a href="productos.php?categoria=Reglas">Reglas</a>
                            <a href="productos.php?categoria=Temperas">Temperas</a>
                            <a href="productos.php?categoria=Tijeras">Tijeras</a>
                            <a href="productos.php?categoria=Sacapuntas">Sacapuntas</a>
                            
                        </div>
                        <!-- Agrega más columnas según sea necesario -->
                    </div>
                </li><br>
                <li><a href="promociones.php">Promociones</a></li><br>
                <li><a href="contacto.php">Contacto</a></li><br>
            </ul>
        </div>
    </nav>
    <br>
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

<div class="products-container">
    <h2>Nuestros Productos Destacados:</h2><br>
    <div class="products-grid">
        <?php
        $conexion = new mysqli("localhost", "root", "46840711", "libreria_kisomi");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

        $query = "
            SELECT p.IDProducto, p.Nombre, p.Descripción, p.Precio, p.IDCategoria, p.IDSubcategoria, p.Stock, p.IDMarca, 
                   i.URL_Imagen, s.Dimension, s.Color, m.Nombre AS nombre_marca
            FROM producto p
            LEFT JOIN imagenes_producto i ON p.IDProducto = i.IDProducto
            LEFT JOIN sub_categoria s ON p.IDSubCategoria = s.IDSubCategoria
            LEFT JOIN marca m ON p.IDMarca = m.IDMarca";

            $conditions = [];
            if (!empty($searchTerm)) {
                $conditions[] = "(p.Nombre LIKE '%" . $conexion->real_escape_string($searchTerm) . "%' 
                                OR p.Descripción LIKE '%" . $conexion->real_escape_string($searchTerm) . "%')";
            }
            
            if (!empty($categoria)) {
                $conditions[] = "p.IDCategoria = (SELECT IDCategoria FROM categoria WHERE Nombre = '" . $conexion->real_escape_string($categoria) . "')";
            }

            if (count($conditions) > 0) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        $result = $conexion->query($query);

        // Mostrar los productos
        if ($result->num_rows > 0) {
        while ($producto = $result->fetch_assoc()) {
            $imagen = strtolower($producto['Nombre']) . ".jpg";
            $idProducto = $producto['IDProducto']; 
            $urlImagen = $producto['URL_Imagen'] ? $producto['URL_Imagen'] : 'img/default.jpg'; // Imagen predeterminada si no hay URL
            ?>
            <div class="products-card">
                <img src="<?php echo $urlImagen; ?>" alt="<?php echo $producto['Nombre']; ?>" class="product-image">
                <h3><?php echo $producto['Nombre']; ?></h3>
                <p class="brand">Marca: <?php echo $producto['nombre_marca']; ?></p>
                <p>Descripción: <?php echo $producto['Descripción']; ?></p>
                <p>Dimensión: <?php echo $producto['Dimension']; ?>
                <p> Color: <?php echo $producto['Color']; ?></p>
                <p>Precio: $<?php echo number_format($producto['Precio'], 2); ?></p>
                <p>Stock: <?php echo $producto['Stock']; ?></p>
                <div class="cart-actions">
                <input type="number" id="cantidad-<?php echo $idProducto; ?>" value="1" min="1" class="quantity-input"><br>
                    <button onclick="añadirAlCarrito(<?php echo $idProducto; ?>)">Añadir al carrito</button>
            </div>
        </div>
            <?php
        }
    } else {
        echo "<p>No se encontraron productos que coincidan con la búsqueda.</p>";
    }
        $conexion->close();
        ?>
    </div>
</div>
    </div>
</div><br>
    </div>

    <script>
// Función para agregar al carrito
function añadirAlCarrito(idProducto) {
    const cantidad = document.getElementById(`cantidad-${idProducto}`).value;

    fetch('agregar_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `IDProducto=${idProducto}&Cantidad=${cantidad}`
    })
    .then(response => response.text())
    .then(data => alert(data)) // Mostrar mensaje de confirmación o error
    .catch(error => console.error('Error:', error));
}
</script>


</div class="whatsapp">
<a href="https://wa.me/543795003045?text=Más%20información%20sobre%20los%20productos." target="_blank" class="whatsapp-button">
    <img src="img/Imagen de WhatsApp.jpg" alt="WhatsApp" />
  </a>

<!-- Incluimos Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="javascript.js"></script>

<!-- Agregar Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <footer>
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
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="producto.php">Producto</a></li>
                    <li><a href="">Categorías</a></li>
                    <li><a href="promociones.php">Promociones</a></li>
                    <li><a href="Contacto.php">Contáctanos</a></li>
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
  </footer>

  <script>
        function updateCartCount() {
            const cartCountElement = document.getElementById('"fas fa-shopping-cart"');
            const cartButton = document.getElementById('cart-dropdown');

            fetch('obtener_arrito.php')
                .then(response => response.json())
                .then(data => {
                    cartCountElement.textContent = data.count;
                    cartButton.style.display = data.count > 0 ? 'block' : 'none';
                });
        }

        document.addEventListener('DOMContentLoaded', updateCartCount);
        
        function incrementQuantity(idmenu) {
            var quantityElement = document.getElementById('quantity_' + idmenu);
            var hiddenQuantityElement = document.getElementById('hidden_quantity_' + idmenu);
            var currentQuantity = parseInt(quantityElement.innerText);
            quantityElement.innerText = currentQuantity + 1;
            hiddenQuantityElement.value = currentQuantity + 1; // Actualiza el valor oculto
        }

        function decrementQuantity(idmenu) {
            var quantityElement = document.getElementById('quantity_' + idmenu);
            var hiddenQuantityElement = document.getElementById('hidden_quantity_' + idmenu);
            var currentQuantity = parseInt(quantityElement.innerText);
            if (currentQuantity > 1) {
                quantityElement.innerText = currentQuantity - 1;
                hiddenQuantityElement.value = currentQuantity - 1; // Actualiza el valor oculto
            }
        }
    </script>

</body>
</html>
