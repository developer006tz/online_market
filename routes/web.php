<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
