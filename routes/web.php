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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'QuestionController@blogQuestionList')->name('blog');

/*Route::get('/', function () {
    return view('blog');
})->name('blog');*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('register', 'CustomAuthController@register');
Route::post('login', 'CustomAuthController@login');


Route::get('question/view/{id}', 'QuestionController@guestView')->name('guestView');

Route::get('question/edit/{id}', 'QuestionController@edit')->name('edit.question');

Route::post('question/edit/{id}', 'QuestionController@update')->name('update.question');

Route::post('question/delete/{id}', 'QuestionController@delete')->name('delete.question');

Route::get('question/like/{id}', 'QuestionController@likequestion');
Route::get('question/dislike/{id}', 'QuestionController@dislikequestion');


// Route::get('question/view/{id}', 'CommentController@viewcomment');

Route::post('question/view/{id}', 'CommentController@add')->name('addcomment');

Route::get('question/edit/comment/{id}', 'CommentController@edit')->name('editcomment');

Route::post('question/edit/comment/{id}', 'CommentController@update')->name('updatecomment');

Route::post('question/delete/comment/{id}', 'CommentController@delete')->name('deletecomment');

Route::get('category/question/view/{id}', 'QuestionController@categoryView')->name('categoryView');






Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contactus');
})->name('contact');

Route::post('/contact', 'MessageController@add')->name('add');

Route::get('notification/read/{id}','HomeController@notificationview');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('socialauth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('socialauth/{provider}/callback', 'SocialAuthController@handleProviderCallback');


Route::get('/forgot', 'Auth\ForgotPasswordController@forgot')->name('forgot');

Route::get('/reset', 'Auth\ResetPasswordController@reset')->name('reset');


Route::get('/addquestion', 'QuestionController@addQuestion')->name('user.addquestion');







Route::group(['prefix'=>'user','middleware'=>'auth'], function(){
    Route::get('/profile', 'UserController@index')->name('user.profile');

    Route::get('/edit', 'UserController@edit')->name('user.edit');
    Route::post('/edit', 'UserController@update')->name('user.update');

    Route::get('/accountsetting', 'UserController@accountsetting')->name('user.accountsetting');
    Route::post('/accountsetting', 'UserController@account')->name('user.account');

    Route::get('/request', 'UserController@request')->name('user.request');
    // Route::get('/activities', 'UserController@activity')->name('user.activities');

    Route::get('profile/{id}', 'UserController@viewuser')->name('user.view');
    
    Route::post('/addquestion', 'QuestionController@storeQuestion')->name('question.storequestion');

   
    
    Route::get('/question', 'QuestionController@viewQuestionList')->name('user.questionlist');

    Route::get('/question/view/{id}', 'QuestionController@showQuestion')->name('user.viewquestion');

    Route::get('/question/edit/{id}', 'QuestionController@editQuestion')->name('user.editquestion');
    Route::post('/question/edit/{id}', 'QuestionController@updateQuestion')->name('question.updatequestion');
    
    Route::post('/question/delete/{id}', 'QuestionController@deleteQuestion')->name('question.delete');
    
    Route::get('/comment', 'CommentController@viewCommentlist')->name('user.commentlist');
    Route::get('/comment/view/{id}', 'CommentController@viewcomment')->name('user.viewcomment');

    Route::get('/comment/edit/{id}', 'CommentController@editcomment')->name('user.editcomment');

    Route::post('/comment/edit/{id}', 'CommentController@updatecomment')->name('user.updatecomment');

    Route::post('/comment/delete/{id}', 'CommentController@deletecomment')->name('comment.delete');
    

    Route::get('/notification', 'UserController@notification')->name('user.notification');
    
});



Route::get('/admin', 'AdminController@login')->name('admin.login');
Route::post('/admin', 'AdminAuthController@login');


Route::group(['prefix'=>'admin','middleware' => 'admin'], function(){
    




    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    
    Route::get('/edit', 'AdminController@editprofile')->name('admin.edit');
    Route::post('/edit', 'AdminController@updateprofile')->name('admin.update');
    
    Route::get('/account', 'AdminController@account')->name('admin.account');
    Route::post('/account', 'AdminController@password')->name('admin.password');

    //alladmin

    Route::get('/admin', 'AdminController@alladmin')->name('admin.alladmin');
    Route::get('/admin/add', 'AdminController@addadmin')->name('admin.addadmin');
    Route::post('/admin/add', 'AdminController@add')->name('admin.add');

    Route::get('/admin/view/{id}', 'AdminController@viewadmin')->name('admin.viewadmin');

    Route::get('/admin/edit/{id}', 'AdminController@editadmin')->name('admin.editadmin');
    Route::post('/admin/edit/{id}', 'AdminController@updateadmin')->name('admin.updateadmin');

    Route::post('/admin/delete/{id}', 'AdminController@deleteAdmin')->name('admin.delete');
    
    //alluser

    Route::get('/user', 'AdminController@alluser')->name('admin.alluser');
    Route::get('/user/view/{id}', 'AdminController@viewuser')->name('admin.viewuser');
    Route::post('/user/delete/{id}', 'AdminController@deleteUser')->name('admin.deleteuser');
    Route::get('/user/ban/{id}', 'AdminController@banuser');
    Route::get('/user/unban/{id}', 'AdminController@unbanuser');
   

    // allcategory

    Route::resource('category', 'CategoryController');
    Route::post('/category/destroy/{id}','CategoryController@destroy');




   //allquestion

    Route::get('/question', 'AdminController@allquestion')->name('admin.question');
    Route::get('/question/view/{id}', 'AdminController@viewquestion')->name('admin.viewquestion');
    

    // allcomment

    Route::get('/comment', 'AdminController@allcomment')->name('admin.allcomment');
    Route::get('/comment/view', 'AdminController@viewcomment')->name('admin.viewcomment');


    // allmessage

    Route::get('/message', 'MessageController@index')->name('message');

    Route::get('/message/view/{id}', 'MessageController@view')->name('admin.viewmessage');
    Route::get('/message/reply/{id}', 'MessageController@reply')->name('admin.replymessage');

    Route::post('/message/delete/{id}','MessageController@delete')->name('admin.deletemessage');


    // add category
    //Route::get('/allcategory', 'AdminController@allcategory')->name('admin.allcategory');
    //Route::get('/allcategory/add', 'AdminController@addcategory')->name('admin.addcategory');





     //admin log-reg    

    // Route::get('/register', 'AdminController@register')->name('admin.register');
    // Route::post('/register', 'AdminAuthController@register');
});


