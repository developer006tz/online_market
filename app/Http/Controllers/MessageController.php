<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Conversation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Requests\MessageUpdateRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Message::class);

        $search = $request->get('search', '');

        $messages = Message::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.messages.index', compact('messages', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Message::class);

        $conversations = Conversation::pluck('id', 'id');
        $users = User::pluck('name', 'id');

        return view('app.messages.create', compact('conversations', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Message::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $message = Message::create($validated);

        return redirect()
            ->route('messages.edit', $message)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Message $message): View
    {
        $this->authorize('view', $message);

        return view('app.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Message $message): View
    {
        $this->authorize('update', $message);

        $conversations = Conversation::pluck('id', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.messages.edit',
            compact('message', 'conversations', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MessageUpdateRequest $request,
        Message $message
    ): RedirectResponse {
        $this->authorize('update', $message);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($message->image) {
                Storage::delete($message->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('file')) {
            if ($message->file) {
                Storage::delete($message->file);
            }

            $validated['file'] = $request->file('file')->store('public');
        }

        $message->update($validated);

        return redirect()
            ->route('messages.edit', $message)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Message $message
    ): RedirectResponse {
        $this->authorize('delete', $message);

        if ($message->image) {
            Storage::delete($message->image);
        }

        if ($message->file) {
            Storage::delete($message->file);
        }

        $message->delete();

        return redirect()
            ->route('messages.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
