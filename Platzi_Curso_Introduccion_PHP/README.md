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

## Uso de eloquent Laravel
* >Este nos permite manejar bases de datos de sql server,mysql, etc; se la misma manera.
* >Nos  dirigimos a ```https://packagist.org/packages/illuminate/database```
* >Copiamos el comando ```composer require illuminate/database``` pero sin el ```composer```
* >En la consola ingresamos 
```php composer.phar require illuminate/database```
* >Se hace de esta manera debido a que tenemos una version de composer instalada en el proyecto.

### Resultado
* >Se generan una modificacion en el composer.json 
```
"require": {
  "illuminate/database": "^5.4"
  ```
  * >Y se genera el ```composer.lock ```
## vendor
* ><p style="color: red">La carpeta vendor no se suele almacenar en el repositorio</p>

## Uso de Eloquent
### Objeto
* >Agregamos al objeto 
```
use Illuminate\Database\Eloquent\Model;
```
* > Para que herede de ```Model```
* >Ejemplo: ```class Flight extends Model```
* >Por ultimo agrgamos las variable protegida ```
protected $table= '[Nombre de la tabla]';```

### ADD e index
* >Unicamente no se agrega la verificacion en el ```index.php```
```<?php
require_once 'vendor\autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'cursophp',
  'username'  => 'root',
  'password'  => '',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
  ]);
  // Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
if(!empty($_POST))//verificacion para que post no se accione si esta vacio
{
    $project=new Project();
    $project->title=$_POST["title"];
    $project->description=$_POST["description"];
    $project->save();
}
?>
```
### Extraer los datos
```
require_once 'vendor\autoload.php';
//En caso de que se requiera usar namespaces se debe declarar en todas las clases y posteriormente se usa el use en donde se requiere usar las clases
use App\Models\Job;
use App\Models\Project;

$jobs=Job::all();//Formas de hacer una peticion con eloquent
$projects=Project::all();
```
## Front controller
## PSR7
## Router

## MCV Creado controllers 
* Se agrega la carpeta views para almacenar las vistas
* En app se crea la carpeta Controllers
``namspace app\Controllers`` tratar de que se mantenga las mayuscuas en los namespace
* Creamos una funcion ```indexAction{}```
unicamente que envie un echo para comprobar que funcione
* en el index que se encuentra en la carpeta public
, en el router vamos a modificar la ruta de index
```
$map->get('index', $baseRoute , [
    'controller'=>'App\controllers\IndexController';
    'action'=>indexAction

  ]);
  ```
  Verificamos por medio de un var dumb a handler funcione

  * Declaramos una variable ```