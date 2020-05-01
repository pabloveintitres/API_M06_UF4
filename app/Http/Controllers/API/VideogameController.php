<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Videogame;
use Validator;


class VideogameController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $videogames = Videogame::all();


        return $this->sendResponse($videogames->toArray(), 'Videogames retrieved successfully.');
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


        $videogame = Videogame::create($input);


        return $this->sendResponse($videogame->toArray(), 'Videogame created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $videogame = Videogame::find($id);


        if (is_null($videogame)) {
            return $this->sendError('Videogame not found.');
        }


        return $this->sendResponse($videogame->toArray(), 'Videogame retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Videogame $videogame)
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


        $videogame->name = $input['name'];
        $videogame->company = $input['company'];
        $videogame->author = $input['author'];
        $videogame->save();


        return $this->sendResponse($videogame->toArray(), 'Videogame updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Videogame $videogame
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();

        return $this->sendResponse($videogame->toArray(), 'Videogame deleted successfully.');
    }


    /**
     * Show all comments from an especific videogame.
     *
     * @param  Videogame  $videogame
     * @return \Illuminate\Http\JsonResponse
     */
    public function allComments (Videogame $videogame)
    {
       $comments = $videogame->comments;

       return $this->sendResponse($comments->toArray(), 'Comments from Videogame: ' . $videogame->name);
    }
}
