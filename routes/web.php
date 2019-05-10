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

Route::get('/', function () {
    return redirect("/home");
});


Route::group(array('prefix' => 'admin'), function()
{
    Route::get("/","Admin\TechnoController@index");
    Route::get("/no-access","Admin\TechnoController@noAccess");

    Route::get("category/{id}/restore", "Admin\CategoryController@restore")->name("category.restore");
    Route::get("category/{id}/delete", "Admin\CategoryController@destroy")->name("category.delete");
    Route::get("category/trash", "Admin\CategoryController@trash")->name("category.trash");
    Route::resource("category","Admin\CategoryController");

    Route::get("type/{id}/restore", "Admin\TypeController@restore")->name("type.restore");
    Route::get("type/{id}/delete", "Admin\TypeController@destroy")->name("type.delete");
    Route::get("type/trash", "Admin\TypeController@trash")->name("type.trash");
    Route::resource("type","Admin\TypeController");

    Route::get("article/{id}/restore", "Admin\ArticleController@restore")->name("article.restore");
    Route::get("article/{id}/delete", "Admin\ArticleController@destroy")->name("article.delete");
    Route::get("article/trash", "Admin\ArticleController@trash")->name("article.trash");
    Route::resource("article","Admin\ArticleController");
    
    Route::get("photo-category/{id}/restore", "Admin\PhotoCategoryController@restore")->name("photo-category.restore");
    Route::get("photo-category/{id}/delete", "Admin\PhotoCategoryController@destroy")->name("photo-category.delete");
    Route::get("photo-category/trash", "Admin\PhotoCategoryController@trash")->name("photo-category.trash");
    Route::resource("photo-category","Admin\PhotoCategoryController");

    Route::get("photo/{id}/restore", "Admin\PhotoController@restore")->name("photo.restore");
    Route::get("photo/{id}/delete", "Admin\PhotoController@destroy")->name("photo.delete");
    Route::get("photo/trash", "Admin\PhotoController@trash")->name("photo.trash");
    Route::get("photo/browse", "Admin\PhotoController@browse")->name("photo.browse");
    Route::resource("photo","Admin\PhotoController");

    Route::get("video/{id}/restore", "Admin\VideoController@restore")->name("video.restore");
    Route::get("video/{id}/delete", "Admin\VideoController@destroy")->name("video.delete");
    Route::get("video/trash", "Admin\VideoController@trash")->name("video.trash");
    Route::get("video/{id}/published", "Admin\VideoController@published")->name("video.published");
    Route::resource("video","Admin\VideoController");

    Route::get("video-category/{id}/restore", "Admin\VideoCategoryController@restore")->name("video-category.restore");
    Route::get("video-category/{id}/delete", "Admin\VideoCategoryController@destroy")->name("video-category.delete");
    Route::get("video-category/trash", "Admin\VideoCategoryController@trash")->name("video-category.trash");
    Route::get("video-category/{id}/published", "Admin\VideoCategoryController@published")->name("video-category.published");
    Route::resource("video-category","Admin\VideoCategoryController");

    
    Route::get("adv/{id}/restore", "Admin\AdvController@restore")->name("adv.restore");
    Route::get("adv/{id}/delete", "Admin\AdvController@destroy")->name("adv.delete");
    Route::get("adv/trash", "Admin\AdvController@trash")->name("adv.trash");
    Route::resource("adv","Admin\AdvController");
    
    Route::get("writers/{id}/restore", "Admin\WritersController@restore")->name("writers.restore");
    Route::get("writers/{id}/delete", "Admin\WritersController@destroy")->name("writers.delete");
    Route::get("writers/trash", "Admin\WritersController@trash")->name("writers.trash");
    Route::resource("writers","Admin\WritersController");
    
    Route::get("users/{id}/restore", "Admin\UserController@restore")->name("users.restore");
    Route::get("users/{id}/delete", "Admin\UserController@destroy")->name("users.delete");
    Route::get("users/{id}/links", "Admin\UserController@links")->name("users.links");
    Route::post("users/{id}/links", "Admin\UserController@saveLinks")->name("users.post.links");
    Route::get("users/trash", "Admin\UserController@trash")->name("users.trash");
    
    Route::get("slider/{id}/restore", "Admin\SliderController@restore")->name("slider.restore");
    Route::get("slider/{id}/delete", "Admin\SliderController@destroy")->name("slider.delete");
    Route::get("slider/trash", "Admin\SliderController@trash")->name("slider.trash");
    Route::resource("slider","Admin\SliderController");
    
    
    Route::get("staticpage/{id}/restore", "Admin\StaticPageController@restore")->name("staticpage.restore");
    Route::get("staticpage/{id}/delete", "Admin\StaticPageController@destroy")->name("staticpage.delete");
    Route::get("staticpage/trash", "Admin\StaticPageController@trash")->name("staticpage.trash");
    Route::resource("staticpage","Admin\StaticPageController");
    
    Route::resource("users","Admin\UserController");
});
Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles', 'HomeController@articles')->name('home.articles');
Route::get('/article/{id}', 'HomeController@article')->name('home.article');
Route::get('/photos', 'HomeController@photos')->name('home.photos');
Route::get('/videos', 'HomeController@videos')->name('home.videos');
Route::get('/page/{id}', 'HomeController@page')->name('home.page');
Route::get('/photo/{id}', 'HomeController@photo')->name('home.photo');
Route::get('/video/{id}', 'HomeController@video')->name('home.video');
Route::get('/contact', 'HomeController@contact')->name('home.contact');*/
Route::get('/home', 'TechnoController@index')->name('home');
//Route::get('/Technohom', 'TechnoController@index')->name('Technohom');
Route::get('/Technoarticles', 'TechnoController@articles')->name('Techno.articles');
Route::get('/Technoarticle/{id}', 'TechnoController@article')->name('Techno.article');
Route::get('/Technophotos', 'TechnoController@photos')->name('Techno.photos');
Route::get('/Technovideos', 'TechnoController@videos')->name('Techno.videos');
Route::get('/Technopage/{id}', 'TechnoController@page')->name('Techno.page');
Route::get('/Technophoto/{id}', 'TechnoController@photo')->name('Techno.photo');
Route::get('/Technovideo/{id}', 'TechnoController@video')->name('Techno.video');
Route::get('/Technocontact', 'TechnoController@contact')->name('Techno.contact');
Route::get('/Technoabout', 'TechnoController@about')->name('Techno.about');
Route::get('/staticpage', 'TechnoController@pages')->name('Techno.pages');
Route::get('/Adv/{id}', 'TechnoController@adv')->name('Techno.Adv');
Route::get('/staticpage/{id}', 'TechnoController@page')->name('Techno.page');


Route::get("members/{id}/restore", "Admin\MembersController@restore")->name("members.restore");
Route::get("members/{id}/delete", "Admin\MembersController@destroy")->name("members.delete");
Route::get("members/trash", "Admin\MembersController@trash")->name("members.trash");
Route::resource("members","Admin\MembersController");