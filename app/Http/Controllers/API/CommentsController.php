<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Videogame;
use App\Comment;
use Validator;


class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $comments = Comment::all();


        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'company' => 'required',
            'author' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $comment = Comment::create($input);


        return $this->sendResponse($comment->toArray(), 'Comment created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $comment = Comment::find($id);


        if (is_null($comment)) {
            return $this->sendError('Comment not found.');
        }


        return $this->sendResponse($comment->toArray(), 'Comment retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Comment $comment)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'company' => 'required',
            'author' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $comment->name = $input['name'];
        $comment->company = $input['company'];
        $comment->author = $input['author'];
        $comment->save();


        return $this->sendResponse($comment->toArray(), 'Comment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();


        return $this->sendResponse($comment->toArray(), 'Comment deleted successfully.');
    }
}
