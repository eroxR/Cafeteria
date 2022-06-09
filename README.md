Laravel is accessible, powerful, and provides tools required for large, robust applications.

Este es una aplicacion parra el mantenimiento de productos de una cafeteria, donde se inclye el almacenamiento de los productos, a venta de los mismo. 

Installation

El programa esta realizado en el framework laravel, por ende se debe de tener instalado en la pc donde se realizzaran la prueba del codigo los siguientes programas:

- Xammp o wamp,
- composer,
- motor de base de datos como My SQL workbench aunque al cargar la aplicación por Xampp el motor de base de datos que utiliza sin necesidad de instalarse en la pc es PHPMYADMIN,
-php en la ultima versión,
NODE.JS
y un editor de texto como Visual Studio Code,
git y git hub.


Using

Se puede cargar el proyecto desde github copiando el codigo, y ejecutando desde la terminar de git el comando git clone seleccionando la ruta donde quiere que se le descargue el proyecto, al descargar el proyecto en su pc debe inicializar la carpeta en un entorno de trabajo como visual studio code; luego se debe de abrir la terminal y ejecutar desde la carpeta del proyecto el comando "composer install" para instalar todas las depenencias que requiere laravel para trabajar. luego ejecutar el comando npm instal, se duplica el archivo ENV.example, y a la copia se le quita el sobrante example, para que nos quede el archivo ENV que es el de algunas configuraciones importantes para que corra el proyecto.

se configura el nombre, usuario y contraseña de la base de datos, se crea la base de datos en el motor de base de datos de su preferencia y se genera una llave unica con el comando "php artisan key generate" en la terminar y ya se puede ejecutar el comando "php serve" para cargar el entorno en la web.
