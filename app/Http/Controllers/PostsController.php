<?php


namespace App\Http\Controllers;

use Session;
use App\Category;
use App\Post;
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
        return view('admin.post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count() == 0) {
            Session::flash('info', 'You must have at least one category');
            return redirect()->back();
        }
        return view('admin.post.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'contents' => 'required',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'contents' => $request->contents,
            'slug' => str_slug($request->title)
        ]);
//        $post = new Post();
//        $post->title = $request->title;
//        $post->featured = 'uploads/posts/' . $featured;
//        $post->category_id = $request->category_id;
//        $post->content = $request->contents;
//        $post->save();
//
        Session::flash('success', 'Post Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.post.edit')->with('posts', $posts)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'category_id' => 'required',
            'contents' => 'required'
        ]);
        $post = Post::find($id);
        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->contents = $request->contents;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('success', 'Post successfully updated');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        Session::flash('success', 'Post is successfully trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();
        Session::flash('success', 'Posts is permanently deleted');
        return redirect()->back();
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        Session::flash('success', 'Post is restored successfully');
        return redirect()->route('posts');
    }
}
