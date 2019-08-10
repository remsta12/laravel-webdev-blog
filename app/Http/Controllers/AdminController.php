<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Post;
use App\User;
use Response;


class AdminController extends Controller
{
    /**
     * Display a listing of post table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::latestFirst()->published()->get();
      return view("dashboard")->with("posts", $posts);
    }

    /**
     * Display a listing of user table
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
      $users = User::get();
      return view("userdash")->with("users", $users);
    }


    /**
    * HASH OUT PARTICULARS: when updating an entry in the DB use the post title as reference to what must be changed
    * with this (as we will soon set it to unique), we can accurately change records
    *[ABOVE REDACTED AS HAVE NOW CHECKED MY CODE]
    * To grab data to enter, use params so data entry from forms in dashboard is passed when method invoked
    *
    **/

    /**
     *Pushes new data to post table
    **/

    public function addPostRecord(Request $request)
    {
      $post = new Post;
      $post->name = $request->get('postForm-name');
      $post->slug = $request->get('postForm-slug');
      $post->title = $request->get('postForm-title');
      $post->excerpt = $request->get('postForm-excerpt');
      $post->body = $request->get('postForm-body');
      $post->image = $request->get('postForm-image');
      $post->save();
      return redirect()->action('AdminController@index')->with('success', 'Data Updated');

    }



    public function editPostRecord(Request $request, $id){
        /**
          * Takes values located in respective form input boxes then saves to DB
        */
        $post = Post::find($id);
        $post->name = $request->get('postForm-name');
        $post->slug = $request->get('postForm-slug');
        $post->title = $request->get('postForm-title');
        $post->excerpt = $request->get('postForm-excerpt');
        $post->body = $request->get('postForm-body');
        $post->image = $request->get('postForm-image');
        $post->save();
        return redirect()->action('AdminController@index')->with('success', 'Data Updated');

        //-return Response::json($post);
        //-return redirect('/admin/main')->back()->with('message', 'IT WORKS!');
    }

    public function editUserRecord(Request $request, $id){
        /**
        */
        $user = User::find($id);
        $user->name = $request->get('userForm-username');
        $user->email = $request->get('userForm-email');
        $user->password = $request->get('userForm-pass');
        $user->remember_token = $request->get('userForm-remtoken');
        $user->save();
        return redirect()->action('AdminController@user')->with('success', 'Data Updated');

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




}
