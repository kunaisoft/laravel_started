<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *  path="/posts",
     *  summary="Get the list of resources",
     *  tags={"Posts"},
     * 
     *   @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/DefaultResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *  security={{ "sanctum": {} }}
     * )
     */
    public function index()
    {
        return response()->success(Post::all());
    }

    /**
     * @OA\Post(
     *      path="/posts",
     *      operationId="storeProject",
     *      tags={"Posts"},
     *      summary="Store new job-posts",
     *      description="Returns job-posts data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *      ),
     *      @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="success", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content"
     *      ),
     * )
     */
    public function store(PostRequest $request)
    {
        try {
            return response()->success(Post::create($request->all()));
        } catch (\Throwable $th) {
            return response()->error($th->getMessage());
        }
    }

   /**
     * @OA\Get(
     *      path="/posts/{id}",
     *      operationId="getProjectById",
     *      tags={"Posts"},
     *      summary="Get post information",
     *      description="Returns post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Posts id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->success($post);
    }

     /**
     * @OA\Put(
     *      path="/posts/{id}",
     *      operationId="updatePost",
     *      tags={"Posts"},
     *      summary="Update existing post",
     *      description="Returns updated post data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/PostRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Post")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->fill($request->all())->save();

            return response()->success($post);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage());
        }
    }

    /**
     * @OA\Delete(
     *      path="/posts/{id}",
     *      operationId="deletePosts",
     *      tags={"Posts"},
     *      summary="Delete existing Posts",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Posts id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id)->delete();

            return response()->success($post);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage());
        }
    }
}
