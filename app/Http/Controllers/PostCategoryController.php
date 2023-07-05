<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostCategoryStoreRequest;
use App\Http\Requests\PostCategoryUpdateRequest;
use Intervention\Image\Facades\Image;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', PostCategory::class);

        $search = $request->get('search', '');

        $postCategories = PostCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.post_categories.index',
            compact('postCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', PostCategory::class);

        return view('app.post_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', PostCategory::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(132, 132);
            $image_resize->encode('jpg', 80);
            $image_resize->save(storage_path('app/public/' . $filename));
            $validated['image'] = $filename;
        }

        $postCategory = PostCategory::create($validated);

        return redirect()
            ->route('post-categories.index', $postCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, PostCategory $postCategory): View
    {
        $this->authorize('view', $postCategory);

        return view('app.post_categories.show', compact('postCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, PostCategory $postCategory): View
    {
        $this->authorize('update', $postCategory);

        return view('app.post_categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        PostCategoryUpdateRequest $request,
        PostCategory $postCategory
    ): RedirectResponse {
        $this->authorize('update', $postCategory);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =time().'.jpg';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(132, 132);
            $image_resize->encode('jpg', 80);
            $image_resize->save(storage_path('app/public/' . $filename));

            if ($postCategory->image) {
                if (file_exists(storage_path('app/public/' . $postCategory->image))) {
                    unlink(storage_path('app/public/' . $postCategory->image));
                }
            }

            $validated['image'] = $filename;
        }

        $postCategory->update($validated);

        return redirect()
            ->route('post-categories.edit', $postCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        PostCategory $postCategory
    ): RedirectResponse {
        $this->authorize('delete', $postCategory);

        if ($postCategory->image) {
            Storage::delete($postCategory->image);
        }

        $postCategory->delete();

        return redirect()
            ->route('post-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
