## Acerca de Este Proyecto

Este proyecto es una aplicación web construida con el framework Laravel. Incluye funcionalidades de autenticación de usuarios, gestión de tareas y gestión de categorías. Hecha para la prueba técnica de Rayco

## Comenzando

### Requisitos Previos

-   PHP >= 7.3
-   Composer
-   Un servidor web (por ejemplo, Apache, Nginx) Aunque también es posible usar

    ```
    php artisan serve
    ```

-   Una base de datos de MySQL

### Instalación

1. **Clona el repositorio:**

    ```sh
    git clone https://github.com/Rakkun9/Raycoprueba-laravel
    cd Raycoprueba-laravel
    ```

2. **Instala las dependencias:**

    ```sh
    composer install
    ```

3. **Copia el archivo de entorno de ejemplo y configúralo:**

    ```sh
    cp .env.example .env
    ```

4. **Genera una clave de aplicación:**

    ```sh
    php artisan key:generate
    ```

5. **Configura tu archivo `.env` con tus credenciales de base de datos:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

6. **Ejecuta las migraciones de la base de datos:**

    ```sh
    php artisan migrate
    ```

7. **Inicia el servidor de desarrollo local:**

    ```sh
    php artisan serve
    ```

8. **Accede a la aplicación:**
   Abre tu navegador web y ve a `http://localhost:8000`.

## Uso Básico

### Autenticación de Usuarios

-   **Registro:** Ve a `/register` para crear una nueva cuenta de usuario.
-   **Inicio de Sesión:** Ve a `/login` para iniciar sesión con tus credenciales.
-   **Cerrar Sesión:** Haz clic en el botón de cerrar sesión para terminar tu sesión.

### Gestión de Categorías

-   **Ver Categorías:** Es necesario crear una nueva categoria para poder guardar y segmentar las tareas en cuestión

-   **Ver Categorías:** Ve a `/categories` para ver todas las categorías.
-   **Crear una Categoría:** Completa el formulario en la página de categorías para crear una nueva categoría.
-   **Editar una Categoría:** Haz clic en una categoría para editar sus detalles.
-   **Eliminar una Categoría:** Haz clic en el botón de eliminar junto a una categoría para eliminarla.

### Gestión de Tareas

-   **Crear una Tarea:** Completa el formulario en la página principal para crear una nueva tarea.
-   **Ver Tareas:** La página principal lista todas las tareas que no están completadas.
-   **Editar una Tarea:** Haz clic en una tarea para editar sus detalles.
-   **Eliminar una Tarea:** Haz clic en el botón de eliminar junto a una tarea para eliminarla.
-   **Marcar como Completada:** Haz clic en el botón de completar para marcar una tarea como completada.
-   **Ver Tareas Completadas:** Ve a `/completed` para ver todas las tareas completadas.

### Advertencia

-   **Los usuarios que se crean acceden a los mismos recursos que los demás usuarios haciendo que sea una aplicación compartida**

## Despliegue en Heroku

### Requisitos Previos

-   Tener una cuenta en [Heroku](https://www.heroku.com/).
-   Agregar un método de pago en [Heroku] (Te va cobrar 1$ dolar para verificar la tarjeta, a mí no me devolvió ese dólar aún).
-   Tener [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli) instalado en tu máquina.

### Pasos para Desplegar

1. **Inicia sesión en Heroku:**

    ```sh
    heroku login
    ```

2. **Crea una nueva aplicación en Heroku:**

    Si ya tienes tu aplicación creada omite el paso número 2

    ```sh
    heroku create nombre-de-tu-aplicacion
    ```

3. **Configura las variables de entorno en Heroku:**

    ```sh
    heroku config:set APP_KEY=$(php artisan key:generate --show)
    heroku config:set DB_CONNECTION=mysql
    heroku config:set DB_HOST=tu_host_de_base_de_datos
    heroku config:set DB_PORT=3306
    heroku config:set DB_DATABASE=tu_base_de_datos
    heroku config:set DB_USERNAME=tu_usuario
    heroku config:set DB_PASSWORD=tu_contraseña
    ```

    (Opcional). **Configura las variables de entorno en Heroku:**

    En la configuración de tu proyecto vas a encontrar una opción que dice `sh setings, config vars`
    Te sirve para modificar directamente las variables de entorno en la página directa de Heroku
    Solo es copiar de tu `.env` y pegar las que sean necesarias

4. **Agrega la base de datos ClearDB MySQL (opcional):**

    Luego, obtén la URL de la base de datos y configúrala en las variables de entorno:
    Así mismo como está en el `.env`

    ```sh
    DB_CONNECTION=mysql
    ```

    Ajusta las variables de entorno en Heroku con los valores obtenidos.

5. **Realiza un commit de todos los cambios:**

    ```sh
    git add .
    git commit -m "Preparando para despliegue en Heroku"
    ```

6. **Despliega la aplicación a Heroku:**

    ```sh
    git push heroku main
    ```

7. **Ejecuta las migraciones en Heroku:**

    ```sh
    heroku run php artisan migrate
    ```

    O Accede a la terminal con:

    ```sh
    Heroku run bash
    ```

    Y ejecuta el comando

    ```sh
    php artisan migrate
    ```

8. **Accede a la aplicación:**
   Abre tu navegador web y ve a [`https://raycoprueba-laravel-00a7dec52432.herokuapp.com/`].

### Notas Adicionales

-   Asegúrate de que tu archivo [`composer.json`] tenga la configuración correcta para Heroku.
-   Puedes configurar otros addons de Heroku según tus necesidades, como Redis, Mailgun, etc.

### Manejo de posibles errores

-   Si da error 403 verifica que el Procfile esté bien configurado y este exactamente con ese nombre

```sh
Procfile
```

    En la carpeta raíz de tu proyecto

-   En caso de que siga con error crea un archivo

```sh
.htaccess
```

Y escribes el siguiente código dentro de este archivo

```sh
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-public
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

-   Si cuando la aplicación corre y te da una advertencia de que la página no es segura
    es debido a que no es 'HTTPS' para poder corregir esto se irán al archivo en tu proyecto que se llama

```sh
Http/providers/AppServiceProvider.php
```

En el método boot ponen el siguiente código

```sh

    if(config('app.env')=== 'production') {
            URL::forceScheme('https');
    }
```

Para forzar https en el entorno de producción que se desplegó en Heroku

### Fin
