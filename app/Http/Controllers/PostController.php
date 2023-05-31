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
use Illuminate\Http\File;
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

        $posts = Post::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.posts.index', compact('posts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Post::class);

        $users = User::pluck('name', 'id');

        return view('app.posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_og(PostStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Post::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public/public');
        }

        $post = Post::create($validated);

        return redirect()
            ->route('posts.index', $post)
            ->withSuccess(__('crud.common.created'));
    }


    public function store(PostStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Post::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_replace(' ','-',strtolower(Auth::user()->name)).'-'. time() .'-'. str_replace(' ','-', substr(strtolower($request->title),0,25) ) . '.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(280, 350);
            $image_resize->encode('jpg',75);
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post): View
    {
        $this->authorize('update', $post);

        $users = User::pluck('name', 'id');

        return view('app.posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(
        PostUpdateRequest $request,
        Post $post
    ): RedirectResponse {
        $this->authorize('update', $post);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $post->update($validated);

        return redirect()
            ->route('posts.index', $post)
            ->withSuccess(__('crud.common.saved'));
    }*/


    public function update(
        PostUpdateRequest $request,
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
            $image_resize->encode('jpg', 75);
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
}
