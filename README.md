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
* > se guarda con el metodo savw
