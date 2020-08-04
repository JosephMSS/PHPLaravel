# Apuntes de curso 
## Instalacion de laravel
* Creacion de proyecto ``laravel new nombre del  proyecto``
* Creacion de servidor 
``php artisan serve``
## Rutas en laravel
* Esta es la manera en la que se elabora una ruta, recibe como parametros el nombre de la ruta y una funcion, la cual puede retornar una vista o un arreglo asociativo.
```
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return [
        'saludo'=>'hola',
        'nombre'=>'Joseph'
    ];
});
```
###  Tipos de metodos para la rutas
* >```Route::post```
* >```Route::get```
* >```Route::delete```
* >```Route::any ``` : cualquier metodo ya sea post, put,delete, va a entrar a  esta ruta. 
## Funcionamiento de blade
* >Este es un motor de rendereo
* >Documentacion: https://laravel.com/docs/5.7/views
* >La informacion se puede obtener desde las rutas por medio de get, en este caso:
```
Route::get('/test', function () {
    return view('test',[
                'title'=>'Curso de php'

    ]);//recibe como parametro el nombre de la vista.
    //ademas puede recibir array, al cual podemos acceder desde la vista );

```
* >Para acceder desde las vistas a las variables que se mandan por la ruta e  imprimirlas se aplica: {{ $variable }}
 ``@isset()``` verifica la existencia del contenido
 ## Creacion de controladores
 * > este se puede hacer desde la consola
 ``` 
 php artisan make:controller NombreController
 ```
 * > Una vez se crea el controlador se pueden crear metodos los cuales pueden ser usados por las rutas por medio de la siguiente manera
 ```
 Route::get('/','HomeController@index');
 ```
 * >Recibe el nombre del controlador, seguido de el metodo al que se quiere ingresar
## Request
* > Se manejan parametros por medio de la url.
* > En los metodos de los controladores se les indica que van a recibir un Objeto tipo ```Request```
```
public function index(Request $request)
    {
        var_dump($request->query('title'));die;
        return view('welcome');
    }
```
* >Con ```$request->query('nombre del parametro','valor por default')``` podemos extraer el contenido de la informacion que se manda  por el request, ademas se puede agregar un segundo parametro opcional que permite establecer el valor por default
## Cofiguracion de Laravel
* > en la carpeta de vendor en el archivo .env vamos a tener todas configuraciones
`` APP_DEBUG= para que nos muestre los errores que se dan mientras se da el desarrollo de la aplicacion.
## Migraciones 
* > Es un medio por el cual podemos trabajar de manera colaborativa en la base de datos y asi no hya que estar mandando a cada rato el script de la base de datos.
Corremos las kigraciones que poseemos por medio del comando ```php artisan migrate```
### Creacion de una tabla pos consola
```
php artisan make:migration create_table_expense_reports --create  
```
* Documentacion de migraciones
* >https://laravel.com/docs/5.7/migrations
## Creacion de modelos con eloquent
La creacion de los modelos se puede hacer desde la coonsola por edio del comando 
```php artisan make:model nombre del modelo```
* bases de datos en plural y modelos en singular
### Comado tinker
* > Entorno que nos permite probar lo que vamos a ejecutar para ver si funciona ```php artisan tinker```
* > Podemos indicar el modelo que  vamos a utilizar para ejecutar las pruebas```App\expenseReport::all```
* >Creamos una instancia en memoria ```$report=new App\ExpenseReport```
* > se guarda con el metodo save
* > Para slir de tinker lo hacemos con ```exit```
## Creacion de nuevas migraciones sobre una tabla existente
```
php artisan make:migration create_colum_title_in_reports --table expen 
se_reports
```
## Controladores y  recursos
* > AL controlador se debe agregar el use de los modelos que se van a utilizar
```
use App\ExpenseReport;
```
* > Con el comando 
```
php artisan make:controller NombreController --resourse 
```
* >Con va a permitir crear los metodos necesarios para la creacion de un CRUD 
## Rutas
* >Se pueden generar las rutas que necesite un CRUD por medio de 
```
Route::resource('/expense_reports','ExpenseReportController');

```
* >Este recibe como parametro el nombre de la ruta y del controlador
## archivos blade
* > Para acceder a archivos que se encuentran en carppetas, debemos ingresar a ellos de la siguiente manera
```
   public function index()
    {
        return view('expenseReport.index',[
            'expenseReports'=>ExpenseReport::all()
        ]);
    }
```
* > Ademas de poder mandar una variable con las consultas.
 * >Nos permite establecer el contenedor donde se establecer el cogigo que vamos a cambiar seguun las vistas, esta seria la parte padre
 ```
 @yield('content')
 ```
 En la parte hija se debe colocar 
 ```@extends ``` para poder utilizar al padre 
 * >  A la parte hija se se asignaria un ```@section``` este debe concidir con el nombre que colocamos en el yield
 ## Creacion del formulario
 * > La ruta qu definimos en el formulario lo hacemos debido a que el metodo store del controlador se va por esta ruta y por medio de un metodo post, esto podemos ver  si hacemos un route:list
```
<form action="/expense_repots" method="post"></form>
```

## CSRF
* > Para evitar el errore 419 se debe colocar ```@CSRF `` despues de iniciar el formulario, esto es para que php genere un token que asegure que la peticion se esta haciendo desde la aplicacion.
* >Es un middkeware, este se encuentra en la  carpeta http en el archivo del kernel.
## Creacion de un objeto
* >Al enviar por medio de post los datos que se necesitan, llos podemos sacar por medio del parametro request que tenemos en el metodo store del controlador
```
  public function store(Request $request)
    {
        $report=new ExpenseReport();
        $report->title= $request->get('title');
        $report->save();
        return redirect('/expense_reports');

    }
```
## Modificacion de elementos
* >  Primero debemmos ejecutar el evento de edit para mandar la informacion al controlador y asi cargar la vista de actualizacion, despues ejecutamos la actualizacion.
* > Para la modificacion de los elementos que se almacenan en la base de datos de debe hacer por medio de in put /patch, sin embargo esto no se puede hacer directamente desde el action que se asigna en el formulario.
```
 <form action="/expense_reports/{{$report->id}}" method="post">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Type a title">
        </div>
        <button  class="btn btn-primary" type="submit">Submit</button>
        </form>
```

## Confirmar Eliminar Elementos
* > Esto se puede hacer por medio de javascript, poir ahora se va a hacer por medio de laravel
* > creamao una nueva vista para confirmar la eliminacion del elemento, ademas creamos una nueva ruta la cual nos mande a la redireccion, ademas de un nuevo elemento que cargue la nueva vista.
* >  Unicamnete hay que cambiar ```@method('put') ``` por  ``` @method('delete')``` 
* > reocrdar que hay que verificar la existencia de lo elementos, ya que se puede modificar por medio de las rutas.
* > esto se puede hacer por medio del metodo 
```
        $report=ExpenseReport::findOrFail($id);

```
* > Debe de arrojar el error 404
## Validacion de archivos
* >Para esto podemos utilizar las validaciondes que nos ofrece laravel https://laravel.com/docs/7.x
Por lo que ekn el controlador debemos emplear el metodo validation que contiene el $request
## Creacion de la visata de los reportes
* > La creacion de las vistas involucra modificar el metodo  de show, ya que en vez de recibir un parametro id reciba el objeto* esto 
* > Esta manera se puede manda la verificacion de la existencia de los datos  directamente y sin la necesidad de ejecutar el findOrFail
