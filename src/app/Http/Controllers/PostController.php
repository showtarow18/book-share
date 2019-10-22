<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;


class PostController extends Controller
{
    private $posts;

    public function __construct(Posts $postClass)
    {
        $this->posts = $postClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postData = $this->posts->orderBy('id','desc')->get();
        // dd($postData);

        return view('post.create', compact('postData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $data = $request->all();
    
        $data['user_id'] = 2;
        $data['book_id'] = 2;
        $data['p_star'] = 3;
        $data['created_at'] = '2019-01-01';
    
        $this->posts->timestamps = false;
        $this->posts->fill($data)->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
