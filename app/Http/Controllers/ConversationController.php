<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ConversationStoreRequest;
use App\Http\Requests\ConversationUpdateRequest;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Conversation::class);

        $search = $request->get('search', '');

        $conversations = Conversation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.conversations.index',
            compact('conversations', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Conversation::class);

        $posts = Post::pluck('title', 'id');
        $users = User::pluck('name', 'id');

        return view('app.conversations.create', compact('posts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConversationStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Conversation::class);

        $validated = $request->validated();

        $conversation = Conversation::create($validated);

        return redirect()
            ->route('conversations.edit', $conversation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Conversation $conversation): View
    {
        $this->authorize('view', $conversation);

        return view('app.conversations.show', compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Conversation $conversation): View
    {
        $this->authorize('update', $conversation);

        $posts = Post::pluck('title', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.conversations.edit',
            compact('conversation', 'posts', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ConversationUpdateRequest $request,
        Conversation $conversation
    ): RedirectResponse {
        $this->authorize('update', $conversation);

        $validated = $request->validated();

        $conversation->update($validated);

        return redirect()
            ->route('conversations.edit', $conversation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Conversation $conversation
    ): RedirectResponse {
        $this->authorize('delete', $conversation);

        $conversation->delete();

        return redirect()
            ->route('conversations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
