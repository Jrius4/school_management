<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    'uses' => 'Home\HomeController@index',
    'as'   => 'home'
]);

Route::get('/admin-come', [
    'uses' => 'Home\HomeController@admin',
    'as'   => 'home'
]);


Route::get('/blog', [
    'uses' => 'BlogController@index',
    'as'   => 'blog'
]);


Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as'   => 'blog.show'
]);

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as'   => 'blog.comments'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as'   => 'category'
]);

Route::get('/author/{author}', [
    'uses' => 'BlogController@author',
    'as'   => 'author'
]);

Route::get('/tag/{tag}', [
    'uses' => 'BlogController@tag',
    'as'   => 'tag'
]);

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as' => 'blog.comments'
]);

Route::auth();

Route::get('/home', 'Backend\HomeController@index');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::put('/backend/blog/restore/{blog}', [
    'uses' => 'Backend\BlogController@restore',
    'as'   => 'backend.blog.restore'
]);
Route::delete('/backend/blog/force-destroy/{blog}', [
    'uses' => 'Backend\BlogController@forceDestroy',
    'as'   => 'backend.blog.force-destroy'
]);
Route::resource('/backend/blog', 'Backend\BlogController',['as' =>'backend']);

Route::resource('/backend/categories', 'Backend\CategoriesController',['as' =>'backend']);

Route::get('/backend/users/confirm/{users}', [
    'uses' => 'Backend\UsersController@confirm',
    'as' => 'backend.users.confirm'
]);
Route::resource('/backend/users', 'Backend\UsersController',['as' =>'backend']);

//services
Route::resource('/backend/services', 'Backend\ServiceController',['as' =>'backend']);
Route::put('/backend/services/restore/{service}', [
    'uses' => 'Backend\ServiceController@restore',
    'as'   => 'backend.services.restore'
]);
Route::delete('/backend/services/force-destroy/{service}', [
    'uses' => 'Backend\ServiceController@forceDestroy',
    'as'   => 'backend.services.force-destroy'
]);
Route::resource('/backend/service-categories', 'Backend\ServiceCategoryController',['as' =>'backend']);
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//backend career
Route::resource('/backend/careers', 'Backend\CareerController',['as' =>'backend']);
Route::put('/backend/careers/restore/{career}', [
    'uses' => 'Backend\CareerController@restore',
    'as'   => 'backend.careers.restore'
]);
Route::delete('/backend/careers/force-destroy/{career}', [
    'uses' => 'Backend\CareerController@forceDestroy',
    'as'   => 'backend.careers.force-destroy'
]);
Route::resource('/backend/career-categories', 'Backend\CareerCategoryController',['as' =>'backend']);
// ./backend career

//backend projects
Route::resource('/backend/projects', 'Backend\ProjectController',['as' =>'backend']);
Route::put('/backend/projects/restore/{project}', [
    'uses' => 'Backend\ProjectController@restore',
    'as'   => 'backend.projects.restore'
]);
Route::delete('/backend/projects/force-destroy/{project}', [
    'uses' => 'Backend\ProjectController@forceDestroy',
    'as'   => 'backend.projects.force-destroy'
]);
Route::resource('/backend/project-categories', 'Backend\ProjectCategoryController',['as' =>'backend']);
// ./backend projects

//backend client testimonies
Route::resource('/backend/client-testimonies', 'Backend\ClientTestimonyController',['as' =>'backend']);
Route::put('/backend/client-testimonies/restore/{client_testimony}', [
    'uses' => 'Backend\ClientTestimonyController@restore',
    'as'   => 'backend.client-testimonies.restore'
]);
Route::delete('/backend/client-testimonies/force-destroy/{client_testimony}', [
    'uses' => 'Backend\ClientTestimonyController@forceDestroy',
    'as'   => 'backend.client-testimonies.force-destroy'
]);
// ./backend client testimonies

//backend field industries
Route::resource('/backend/field-industries', 'Backend\FieldIndustryController',['as' =>'backend']);
Route::put('/backend/field-industries/restore/{field_industry}', [
    'uses' => 'Backend\FieldIndustryController@restore',
    'as'   => 'backend.field-industries.restore'
]);
Route::delete('/backend/field-industries/force-destroy/{field_industry}', [
    'uses' => 'Backend\FieldIndustryController@forceDestroy',
    'as'   => 'backend.field-industries.force-destroy'
]);
// ./backend field-industries


//backend system-processes
Route::resource('/backend/system-processes', 'Backend\SystemProcessController',['as' =>'backend']);
Route::put('/backend/system-processes/restore/{system_process}', [
    'uses' => 'Backend\SystemProcessController@restore',
    'as'   => 'backend.system-processes.restore'
]);
Route::delete('/backend/system-processes/force-destroy/{system_process}', [
    'uses' => 'Backend\SystemProcessController@forceDestroy',
    'as'   => 'backend.system-processes.force-destroy'
]);
// ./backend system-processes


//backend quote-requests
Route::resource('/backend/quote-requests', 'Backend\QuoteRequestController',['as' =>'backend']);
Route::put('/backend/quote-requests/restore/{quote_request}', [
    'uses' => 'Backend\QuoteRequestController@restore',
    'as'   => 'backend.quote-requests.restore'
]);
Route::delete('/backend/quote-requests/force-destroy/{quote_request}', [
    'uses' => 'Backend\QuoteRequestController@forceDestroy',
    'as'   => 'backend.quote-requests.force-destroy'
]);
// ./backend quote-requests

//backend ndebi-tech-clients
Route::resource('/backend/ndebi-tech-clients', 'Backend\NdebiTechClientController',['as' =>'backend']);
Route::put('/backend/ndebi-tech-clients/restore/{ndebi_tech_client}', [
    'uses' => 'Backend\NdebiTechClientController@restore',
    'as'   => 'backend.ndebi-tech-clients.restore'
]);
Route::delete('/backend/ndebi-tech-clients/force-destroy/{ndebi_tech_client}', [
    'uses' => 'Backend\NdebiTechClientController@forceDestroy',
    'as'   => 'backend.ndebi-tech-clients.force-destroy'
]);
// ./backend ndebi-tech-clients

//web navigation
//careers

Route::resource('/careers', 'Home\CareerController',['only'=>['index','show','as'=>'careers']]);

//processes
Route::resource('/processes', 'Home\ProcessController',['only'=>['index','show','as'=>'processes']]);
Route::resource('/projects', 'Home\ProjectController',['only'=>['index','show','as'=>'projects']]);
Route::resource('/services', 'Home\ServiceController',['only'=>['index','show','as'=>'services']]);
Route::resource('/service-categories', 'Home\ServiceCategoryController',['only'=>['index','show','as'=>'service-categories']]);
// Route::get('/service-categories/{service_category}','Home\ServiceController@showCategory',['as'=>'service-categories']);
Route::resource('/quote-requests','Home\QuoteRequestController',['as'=>'quote-requests']);
Route::get('/about-us','Home\HomeController@aboutUs');
Route::get('/contact-us','Home\HomeController@contactUs');

Route::get('/send/email','Home\HomeController@mail');

Route::get('/routes', function() {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
        echo "<tr>";
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='10%'><h4>Route</h4></td>";
            echo "<td width='10%'><h4>Name</h4></td>";
            echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
            echo "<td>" . $value->methods()[0] . "</td>";
            echo "<td>" . $value->uri() . "</td>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
    echo "</table>";
});
