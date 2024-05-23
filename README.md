# PopMovies Online Store

## Descripción
PopMovies es un e-commerce innovador enfocado en la venta de películas físicas, creado especialmente para amantes del cine, coleccionistas, y quienes valoran la experiencia de una película en formato tangible. Nuestra misión es construir una comunidad apasionada por el cine, ofreciendo un catálogo amplio y diverso y secciones informativas sobre el mundo cinematográfico. PopMovies se dedica a proporcionar una experiencia única y completa, desde la búsqueda de una película favorita hasta su entrega física, creando un vínculo especial entre el cine y su audiencia.

## Versiones de software en que fue ejecutado el proyecto
- PHP 8.2.12
- Laravel 10.x
- XAMPP 3.3.0
- Composer 2.7.1

## Configuración de la Base de Datos
1. Crear una base de datos en el motor deseado (En nuestro caso usamos XAMPP)
2. Crear el archivo .env a partir del archivo .env.example
3. Configurar las credenciales de la base de datos en el archivo `.env`.
4. Ejecutar la llave de la aplicación: `php artisan key:generate`.
5. Ejecutar migraciones: `php artisan migrate`.

## Ejecución del Proyecto
1. Clonar el repositorio: `git clone https://github.com/DavidAgudeloTapias/PopMovies.git`
2. Ubicarse en la linea de comandos, sobre la carpeta donde se clonó el repositorio
3. Realizar la "Configuración de la Base de Datos" (Sección de arriba)
4. Ejecutar el comando `php artisan serve`
5. En el navegador pegar  este link: `http://127.0.0.1:8000`

## Rutas del usuario final
- `/`: Página principal de la tienda con el listado de películas.
- `/movies/`: Listado de las películas en venta.
- `/movies/{id}`: Detalle de una película específica.
- `/news/`: Listado de las noticias subidas a la página.
- `/news/{id}`: Detalle de una noticia específica.
- `/cart`: Carrito de compras del usuario.
- `/my-account/orders`: Página donde el usuario autenticado ve la lista de ordenes de compra realizadas.

## Rutas del administrador
- `/admin`: Página principal de la interfaz de administrador.
- `/admin/movies`: Página para añadir nuevas películas y listado de películas creadas.
- `/admin/movies/{id}/edit`: Página para editar la película seleccionada.
- `/admin/news`: Página para añadir nuevas noticias y listado de noticias existentes.
- `/admin/news/{id}/edit`: Página para editar la noticia seleccionada.

## Software usado
- Laravel: Framework de PHP.
- Bootstrap: Framework de CSS.
- XAMPP: Servidor web Apache local.
