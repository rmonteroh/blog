<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0){
            session()->flash('info', 'You must have some categories before attempting to create a post');
            return redirect()->route('category.create');
        }
        
        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $img = $request->image;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/posts', $img_new_name);

        $post = Post::create([
            'title'=> $request->title,
            'image'=> 'uploads/posts/'.$img_new_name,
            'content'=> $request->content,
            'category_id'=> $request->category_id,
            'slug'=> str_slug($request->title),
        ]);

        session()->flash('success', 'Post created succesfuly');

        return redirect()->route('post.create');
        
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
        $post = Post::findOrFail($id); 
        $post->delete();
        
        Session::flash('success', 'You succesfully deleted a post');
        return redirect()->route('posts');
    }
}
