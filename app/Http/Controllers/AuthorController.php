<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;


    /**
     * Returns author list
     * 
     */

    public function index()
    {
        $authors = Author::all();

        return $this->successResponse($authors);
    }

        /**
     * Returns author list
     * 
     */

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }

            /**
     * Returns author list
     * 
     */

    public function update(Request $request, $author)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules);

        $authorResponse = Author::findOrFail($author);

        $authorResponse->fill($request->all());

        if($authorResponse->isClean()){
            return $this->errorsResponse('at least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($authorResponse);
    }

            /**
     * Returns author list
     * 
     */

    public function show($author)
    {
        $authorResponse = Author::findOrFail($author);

        return $this->successResponse($authorResponse);
    }

            /**
     * Returns author list
     * 
     */

    public function destroy($author)
    {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);

    }
}
