<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ConversationController;
use Illuminate\Http\Request;
use App\Models\Post;
use Chatify\Http\Controllers\MessagesController;
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



Route::get('/', function (Request $request) {
    $search = $request->get('search', '');

    $posts = Post::search($search)
        ->latest()
        ->paginate(4)
        ->withQueryString();
        $recent_posts = Post::latest()->take(4)->get();
    return view('welcome', compact('posts', 'search', 'recent_posts'));
});

Route::middleware(['auth'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');


/*Route::get('/chat/{user}', function ($user) {
    return redirect()->route('chatify', ['id' => $user]);
});*/


Route::get('post-details/{post}', [
    PostController::class,
    'web_show_post_details',
])->name('web_post.show');

Route::get('all-posts', [
    PostController::class,
    'show_all_posts',
])->name('all-post.show');


Route::group(['middleware' => ['web', 'auth']], function () {
    //...
    // Chatify Routes
    Route::get('/chatify', 'Chatify\Http\Controllers\MessagesController@index')->name(config('chatify.routes.home'));
    Route::get('/chatify/messages', 'Chatify\Http\Controllers\MessagesController@fetch')->name(config('chatify.routes.fetch'));
    Route::post('/chatify/send', 'Chatify\Http\Controllers\MessagesController@send')->name(config('chatify.routes.send'));
    Route::get('/chatify/user/{id}', 'Chatify\Http\Controllers\MessagesController@user')->name(config('chatify.routes.user'));
    Route::get('/chatify/seen', 'Chatify\Http\Controllers\MessagesController@seen')->name(config('chatify.routes.seen'));
    Route::get('/chatify/delete/{id}', 'Chatify\Http\Controllers\MessagesController@deleteConversation')->name(config('chatify.routes.deleteConversation'));
    Route::post('/chatify/update/settings', 'Chatify\Http\Controllers\MessagesController@updateSettings')->name(config('chatify.routes.updateSettings'));
    Route::post('/chatify/star', 'Chatify\Http\Controllers\MessagesController@favorite')->name(config('chatify.routes.favorite'));
    Route::get('/chatify/starred', 'Chatify\Http\Controllers\MessagesController@getFavorites')->name(config('chatify.routes.getFavorites'));
    Route::post('/chatify/upload', 'Chatify\Http\Controllers\MessagesController@upload')->name(config('chatify.routes.upload'));
    Route::get('/chatify/download/{fileName}', 'Chatify\Http\Controllers\MessagesController@download')->name(config('chatify.routes.download'));
});



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
    Route::get('/chat/{user}', function ($user) {
        return redirect()->route('chatify', ['id' => $user]);
    })->name('chat');



});

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('post-categories', PostCategoryController::class);
        Route::resource('messages', MessageController::class);
        Route::resource('conversations', ConversationController::class);
        Route::resource('posts', PostController::class);

    });
