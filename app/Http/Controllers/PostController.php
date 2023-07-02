<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;
use Intervention\Image\Facades\Image;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Post::class);

        $search = $request->get('search', '');
        if (auth()->user()->hasRole('super-admin')) {
            $posts = Post::search($search)
                ->latest()
                ->paginate(10)
                ->withQueryString();
        } else {
            $posts = Post::where('user_id', auth()->user()->id)->search($search)
                ->latest()
                ->paginate(10)
                ->withQueryString();
        }

        return view('app.posts.index', compact('posts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Post::class);
        $user = auth()->user();
        $users = $user->hasRole('customer') ||  $user->hasRole('seller')  ? collect([$user->id => $user->name]) : User::pluck('name', 'id');
        $postCategories = PostCategory::pluck('title', 'id');
        return view('app.posts.create', compact('users', 'postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
  

    public function store(PostStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Post::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_replace(' ','-',strtolower(Auth::user()->name)).'-'. time() .'-'. str_replace(' ','-', substr(strtolower($request->title),0,25) ) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(280, 350);
            $image_resize->encode('jpg',80);
            $image_resize->save(storage_path('app/public/' . $filename));
            $validated['image'] = $filename;
        }

        $post = Post::create($validated);

        return redirect()
            ->route('posts.index', $post)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        $this->authorize('view', $post);
        return view('app.posts.show', compact('post'));
    }

    public function web_show_post_details(Request $request, Post $post): View
    {
        return view('website-pages.posts.detail',compact('post'));
    }

    public function show_post_by_category($category): View
    {
        $category_ = PostCategory::find($category);
        if(!empty($category_)){
            $posts = Post::where('post_category_id', $category)->latest()->paginate(5);
            return view('website-pages.posts.all', compact('posts','category_'));
        }else{
            return redirect()->back()->with('error', 'Category not found');
        }
    }

    public function show_recent_post(): View
    {
        $posts = Post::latest()->paginate(5);
        $title = 'Recent Posts';
        return view('website-pages.posts.all', compact('posts','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post): View
    {
        $this->authorize('update', $post);

        $postCategories = PostCategory::pluck('title', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.posts.edit',
            compact('post', 'users', 'postCategories')
        );
    }



    public function update(
        PostStoreRequest $request,
        Post $post
    ): RedirectResponse {
        $this->authorize('update', $post);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =
            str_replace(' ', '-', strtolower(Auth::user()->name)) . '-' . time() . '-' . str_replace(' ', '-', substr(strtolower($request->title), 0, 25)) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(280, 350);
            $image_resize->encode('jpg', 80);
            $image_resize->save(storage_path('app/public/' . $filename));

            if ($post->image) {
                // check if file exists
                if (file_exists(storage_path('app/public/' . $post->image))) {
                    // delete file
                    unlink(storage_path('app/public/' . $post->image));
                }
            }

            $validated['image'] = $filename;
        }

        $post->update($validated);

        return redirect()
            ->route('posts.index', $post)
            ->withSuccess(__('crud.common.saved'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);

        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->withSuccess(__('crud.common.removed'));
    }
    public function show_all_posts(Request $request): View
    {
        $posts = Post::latest()->paginate(5);
        return view('website-pages.posts.all', compact('posts'));
    }
}
