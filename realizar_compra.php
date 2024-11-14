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
    <h3>Selecciona el tipo de entrega:</h3>
    <form method="POST" action="seleccionar_entrega.php">
        <input type="radio" id="retiro" name="entrega" value="retiro" required>
        <label for="retiro">Retiro en tienda física</label><br>
        
        <input type="radio" id="envio" name="entrega" value="envio" required>
        <label for="envio">Envío a domicilio</label><br>
        
        <button type="submit">Continuar</button>
    </form>
</body>
</html>


