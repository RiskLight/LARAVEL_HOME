<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Film;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $comments = Comment::paginate(15);
        return view('admin_panel.comments', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @param Film $film
     * @return RedirectResponse
     */
    public function store(CommentRequest $request, Film $film)
    {

        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['film_id'] = $film->id;
        Comment::create($data);
        return redirect()->route('films.content.show', $film->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(CommentRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        $comment = Comment::find($id);
        $comment->update($data);
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comments.index');
    }
}
