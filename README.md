# Descripción

Prueba tecnica para double V partners - Desarrollador Full Stack 

## Servidor de desarrollo y inicio proyecto 
Ejecutar  `docker-compose up -d`

Una vez realizado debe de terminar asi:
<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/rundocker.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/rundocker.png?raw=true" width="600"></a></p>

Si desafortunadamente no se puede iniciar el proyecto por docker, esta la otra opcion de ejecutar `php artisan serve` luego verificar el archivo `env` para configuracion del base de datos , luego ejecutar `php artisan migrate` luego ejecutar `php artisan seed` este ultimo no es necesario si lo quieren.
# Descripción detallada

Acontinuación se muestra el consumo desde postman servicio hecho con laravel y GraphQL

-Para lista

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/all.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/all.png?raw=true" width="600"></a></p>


-Creación

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/create.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/create.png?raw=true" width="600"></a></p>


-lista despues de la creación

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/create-list.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/create-list.png?raw=true" width="600"></a></p>


-Actualizar 

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/update.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/update.png?raw=true" width="600"></a></p>


-lista despues de la actualización

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/update-list.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/update-list.png?raw=true" width="600"></a></p>


-Eliminar

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/delete.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/delete.png?raw=true" width="600"></a></p>

-lista despues de la eliminar

<p align="center"><a href="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/delete-list.png?raw=true" target="_blank"><img src="https://github.com/jhonhenrybernal/doublevpartners-back/blob/main/public/imagenesPruebasTecnica/delete-list.png?raw=true" width="600"></a></p>