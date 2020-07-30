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
