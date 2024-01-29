# Proyecto-Comercializadora
 Versionamiento de avances del proyecto de la comercializadora.

---Proceso de vedrsionamiento para respaldar archivos (versionados) en github--

El formato para versionar los proyectos es el siguiente: 

* (dia-mes-año)-(Avance{TipoDeAvance})-(Descripción)

Ejemplo:

  (23-01-24)-(AvanceGeneral)-(1)

I.- Una vez asignado el nombre de versión al proyecto con el formato establecido, realizar los siguientes pasos:

1.-Descargar github desktop.

2.- En caso de no existir el repositorio dar clic en crear repositorio.

3.-Agregar la carpeta del proyecto versionado en el repositorio creado. 

4.-Dar clic en fetch origin.

5.-Asignar un nombre al commit (descripción del avance (summary)) y dar clic en commit to main.

6.- Posteriormente, una vez que tengamos en la interfaz de inicio "No local changes", dar clic en "push origin" .



--Procedimiento para ejecutar una nueva versión del proyecto--

I.-Para poder ejecutar el proyecto implementado en php, html, js, css, mysql y phpMyAdmin; necesitamos instalar el servidor y manejador de XAMPP y ejecutar sql y apache.

II.- Para verificar la conexión del servidor XAMPP se debe de ingresar el siguiente url al navegador del sistema: http:localhost. Este debe de direccionar a la página de inicio de XAMPP.

III.- Para acceder a la base de datos escribir en el navegador: localhost/phpmyadmnin. Esto nos va a direccionar a la página de inicio de PHPMyAdmin.

Una vez hayamos  hecho los pasos anteriores, procedemos a compilar y a ejecutar nuestra aplicación web.

1.-Crear una carpeta (que será nuestro proyecto) y asignarle un nombre (Nombre de la direccion en el URL) en el siguiente directorio: C:\xampp\htdocs.  (windows, puede variar el directorio según el sistema operativo)

2-Importar la carpeta en visual  studio code con la dirección : C:\xampp\htdocs\tu_proyecto

3.-Acceder a los archivos php y cambiar la contraseña, servidor y usuario. En la mayoría de los casos el servidor es "127.0.0.1", la contraseña es un espacio en blanco "" y el usuario es "root".

4.- Ejemplo de conexion a la BD: $conexion=newmysqli("127.0.0.1", "root", "", "NombreBaseDatos");

5- Posteriormente, para seguir con el proceso de compilación del proyecto de manera local en el servidor, escribir en el navegador: localhost/tu_proyecto 
