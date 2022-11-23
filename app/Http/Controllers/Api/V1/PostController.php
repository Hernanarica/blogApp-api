<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostShowResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return JsonResponse
	 */
	public function index()
	{
		return (new PostCollection(Post::with('user')->paginate(12)))->response()->setStatusCode(200);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param PostStoreRequest $request
	 * @return JsonResponse
	 */
	public function store(PostStoreRequest $request)
	{
		$post = Post::create([
			'user_id'     => $request->user_id,
			'title'       => $request->title,
			'description' => $request->description,
			'body'        => $request->body
		]);
		
		return response()->json([
			'status' => 'success',
			'post'   => $post,
		]);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param Post $post
	 * @return PostShowResource
	 */
	public function show(Post $post)
	{
		return (new PostShowResource($post));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}