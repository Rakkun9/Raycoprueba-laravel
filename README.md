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
    git clone https://github.com/tu-repo/tu-proyecto.git
    cd tu-proyecto
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

### Gestión de Tareas

-   **Crear una Tarea:** Completa el formulario en la página principal para crear una nueva tarea.
-   **Ver Tareas:** La página principal lista todas las tareas que no están completadas.
-   **Editar una Tarea:** Haz clic en una tarea para editar sus detalles.
-   **Eliminar una Tarea:** Haz clic en el botón de eliminar junto a una tarea para eliminarla.
-   **Marcar como Completada:** Haz clic en el botón de completar para marcar una tarea como completada.
-   **Ver Tareas Completadas:** Ve a `/completed` para ver todas las tareas completadas.

### Gestión de Categorías

-   **Ver Categorías:** Ve a `/categories` para ver todas las categorías.
-   **Crear una Categoría:** Completa el formulario en la página de categorías para crear una nueva categoría.
-   **Editar una Categoría:** Haz clic en una categoría para editar sus detalles.
-   **Eliminar una Categoría:** Haz clic en el botón de eliminar junto a una categoría para eliminarla.

## Contribuyendo

Este proyecto quedará en un repositorio privado para la protección de datos.
