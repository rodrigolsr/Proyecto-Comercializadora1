<!DOCTYPE html>
<html>
<head>
<title>Pagina Catálogo</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Link a la pagina de estilos utilizando como base el formato predeterminado w3 !-->
<link rel="stylesheet" href="css/style_index.css" type="text/css">
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
  <div class="w3-container">
    <button onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      &times;
    </button>
    <img src="images/profile.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Información de la empresa</b></h4>
    
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>CATALOGO</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>COMERCIALIZADORA</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACTO</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="images/profile.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <button class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()">☰</button>
    <div class="w3-container">
      
      <h1><b>Catálogo de productos</b></h1>
      <div class="w3-section w3-bottombar w3-padding-16">
        <span class="w3-margin-right">Filter:</span> 
        <button class="w3-button w3-black">ALL</button>
        <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Mejores productos</button>
        <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Modelos</button>
        <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Almacenes</button>
        <button class="w3-button w3-green w3-margin" onclick="window.location.href='agregar.php'">Registrar Producto</button>

      </div>
    </div>
  </header>

    <!--Encabezado para el filtrado de productos-->
  <div class="w3-container">
      <h2><b>Filtrar Productos</b></h2>

      <!-- Formulario con estilos similares al input de búsqueda -->
      <form id="filtrar" action="filtrado.php" method="post">
        <label for="filtro-atributo">Filtrar por Atributo:</label>
        <select name="atributo" id="filtro-atributo">
            <option value="id">id</option>
            <option value="nombre">Nombre</option>
            <option value="descripcion">Descripción</option>
            <option value="cantidad">Cantidad</option>
            <option value="precio">Precio</option>
            <!-- Agrega más opciones según los atributos que desees permitir filtrar -->
        </select>
    
      <label for="filtro-valor">Valor:</label>
      <input type="text" name="valor" id="filtro-valor" required>

        <!-- Input con estilo en línea para el color de fondo -->
        <input type="submit" style="background-color: #2ecc71; color: white; padding: 10px; border: none; cursor: pointer;">
          <i class="fa fa-search" style="margin-right: 5px;"></i>

      </form>
    <!-- Div para los resultados del filtrado -->
    
        <div class="w3-container w3-padding-large" id="resultados-filtrado"></div>
      
   </div>
   


<!--Sección del catálogo general !-->

  <div class="w3-container w3-padding-large">
  <h2><b>Productos totales registrados</b></h2>
    <table class="w3-table w3-bordered">
        <tr class="w3-dark-grey">
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>

        <?php
            // Conexión a la base de datos
            $conexion = new mysqli("127.0.0.1", "root", "", "prueba");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consultar la base de datos
            $consulta = $conexion->query("SELECT * FROM productos");

            // Verificar si la consulta fue exitosa
            if (!$consulta) {
                die("Error en la consulta: " . $conexion->error);
            }

            // Mostrar los resultados
            while ($fila = $consulta->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$fila['id']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['descripcion']}</td>";
                echo "<td>{$fila['cantidad']}</td>";
                echo "<td>{$fila['precio']}</td>";
                echo "<td>
                        <a href='editar.php?id={$fila['id']}'>Editar</a> |
                        <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
                    </td>";
                echo "</tr>";
            }

            // Cerrar conexión
            $conexion->close();    
            ?>
        </table>
    </div>
  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>

  </div>

  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16" id="about">
    <div class="w3-col m6">
      <img src="images/catalizador2.jpg" alt="Me" style="width:100%">
    </div>
    <div class="w3-col m6">
      <img src="images/catalizador3.jpg" alt="Me" style="width:100%">
    </div>
  </div>

  <div class="w3-container w3-padding-large" style="margin-bottom:32px">
    <h4><b>Acerca de la empresa</b></h4>
    <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    <hr>
    
    <h4>Evaluacion del cliente</h4>
    <!-- Progress bars / Skills -->
    <p>Calidad</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%; background-color: #28b463;" >95%</div>
    </div>
    <p>Disponibilidad</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%; background-color: #28b463">85%</div>
    </div>
    <p>Piezas</p>
    <div class="w3-grey">
      <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%; background-color: #28b463;">80%</div>
    </div>
    <p>
      <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
        <i class="fa fa-download w3-margin-right"></i>Download Resume
      </button>
    </p>
    <hr>
    
    <h4>Planes de compra</h4>
    <!-- Pricing Tables -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Cliente frecuente</li>
          <li class="w3-padding-16">Premios</li>
          <li class="w3-padding-16">Bonos</li>
          <li class="w3-padding-16">Promociones</li>
          <li class="w3-padding-16">Producto</li>
          <li class="w3-padding-16">
            <h2>$ 10</h2>
            <span class="w3-opacity">Rebajas</span>
          </li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-teal w3-xlarge w3-padding-32">Cliente recurrente</li>
          <li class="w3-padding-16">Funcionalidad</li>
          <li class="w3-padding-16">Calidad</li>
          <li class="w3-padding-16">Stock</li>
          <li class="w3-padding-16">Preguntas frecuentes</li>
          <li class="w3-padding-16">
            <h2>$ 25</h2>
            <span class="w3-opacity">Descuentos</span>
          </li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
      
      <div class="w3-third">
        <ul class="w3-ul w3-border w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-black w3-xlarge w3-padding-32">Cliente mayorista</li>
          <li class="w3-padding-16">Por mayoreo</li>
          <li class="w3-padding-16">Por unidad</li>
          <li class="w3-padding-16">Catalogo</li>
          <li class="w3-padding-16">Productos</li>
          <li class="w3-padding-16">
            <h2>$ 25</h2>
            <span class="w3-opacity">Promocion del mes</span>
          </li>
          <li class="w3-light-grey w3-padding-24">
            <button class="w3-button w3-teal w3-padding-large w3-hover-black">Sign Up</button>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contactanos</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>email@email.com</p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p>CDMX, PACHUCAs</p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
        <p>512312311</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>Promociones</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      
    </div>
  
    <div class="w3-third">
      <h3 >Publicaciones de la empresa (Avisos)</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="images/velocimetro.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large" style="color: black;">Lorem</span><br>
          <span style="color: black;">Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="images/wallpaper.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large" style="color: black;">Ipsum</span><br>
          <span style="color: black;">Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>Productos populares</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Catalizadores</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">London</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Juguetes</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">DIY</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Autopartes</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Family</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Otros</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Shopping</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Urnas</span>
      </p>
      </table> 
    </div>

  </div>
  </footer>
  
  <div class="w3-black w3-center w3-padding-24">PIREC TRANSVAAL </div>

<!-- End page content -->
</div>

<!-- script para la funcionalidad de la responsividad del sistema -->
<script src="script/script_index.js"></script>
<script src="script/filtrado_index.js"></script>
</body>
</html>