<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Sobre este proyecto 

API utilizando el gramework Larabel apoyado en la documentacion oficial [documentation](https://laravel.com/docs) y la especificación JSON API [documentation](https://jsonapi.org/) que permitira especificar las reglas al momento de dar una respuesta a determinado cliente que este solicitanto un recurso.

## Pasos a realizar al para ejecutar el proyecto

    - Ejecutar el comando composer install para instalar todas las dependencias que necesita el proyecto.
    - Configurar el archivo .env para el uso de la base de datos.
    - Ejecutar el comando php artisan serve, para iniciar el servidor en la url http://127.0.0.1:8000
    - Testear la API con Postman.

## Elementos utilizados

    - El uso de pruebas unitarias, que ayudaran a validar el correcto funcionamiento de nuestros end-points junto los resultados de cada uno de ellos. 
    - El uso de recursos y colecciones, que permitiran formatear la salida a los valores requeridos por nosotros o las necesidades presentadas.
    - El uso de Form Request para realizar el proceso de validacion de la información obtenida del cliente que este solicitando el recurso. 
    - El uso de la herramienta Passport para la autenticación de los usuarios y la protección de cada uno de los end-points. 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
