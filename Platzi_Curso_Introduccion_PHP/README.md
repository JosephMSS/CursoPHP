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