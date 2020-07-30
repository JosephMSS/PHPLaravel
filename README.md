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
