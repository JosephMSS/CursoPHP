# curso-introduccion-php
## Instalacion de composer
* >cargar el ```composer.phar``` en el proyecto
* >crear el archivo ```composer.json```
* > Esto sirve para poder pasar los namespaces y asi cargarlos demanera automaticamente cargando los namespace App y buscando los que sean hijos de app/   

```{
    "autoload": {
        "psr-4":{
            "App\\":"app/"
        }
    },
    "require": {}
}
```
* >Abrir a consola y dentro del projecto ingresar: ```php composer.phar install```
### Resultado
* >En caso de éxito 
```Loading composer repositories with package information
Updating dependencies (including require-dev)
Nothing to install or update
Generating autoload files
```

* >se crea la carpeta vendor con la clase ```autoload.php```
## Uso
* > Podemos eliminar los require de la clase ```jobs.php``` y de todas las clases, univcamente requerimos los ```use```
* >Solo agregar el ```require_once 'vendor\autoload.php';```
## ORM
Hector Benitez:
 > Un ORM, que significa Object Relational Mapping, es un concepto en el cual vamos a crear dentro de nuestro código algunos modelos basados en las tablas de nuestra base de datos.
 >   Una principal característica de un ORM es que hace más transparente las conexiones a PostgreSQL y MySQL, además nos protege de algunas vulnerabilidades de SQL y facilita algunas validaciones a la información.

