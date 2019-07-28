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
    * Pushes new data to post (or any?) table
    *
    *
    *public function add()
    *{
    *  $ posts = DB::table('posts') -> insertGetId(
    *    ['']
    *    )
    *}
    **/
    public function editPostRecord(Request $request, $id){
        /**
          *HOLY FUCKING SHIT I DID DON'T TOUCH THIS SHIT REMY
          * OK now we just have to make it so it uses the placeholder as input if nothing else entered
        */
        $post = Post::find($id);
        $post->slug = $request->get('editForm-slug');
        $post->title = $request->get('editForm-title');
        $post->excerpt = $request->get('editForm-excerpt');
        $post->body = $request->get('editForm-body');
        $post->image = $request->get('editForm-image');
        $post->save();
        return redirect()->action('AdminController@index')->with('success', 'Data Updated');

        //-return Response::json($post);
        //-return redirect('/admin/main')->back()->with('message', 'IT WORKS!');
    }

    public function editUserRecord(Request $request, $id){
        /**
        */
        $user = User::find($id);
        $user->name = $request->get('editForm-username');
        $user->email = $request->get('editForm-email');
        $user->password = $request->get('editForm-pass');
        $user->remember_token = $request->get('editForm-remtoken');
        $user->save();
        return redirect()->action('AdminController@user')->with('success', 'Data Updated');

        //-return Response::json($post);
        //-return redirect('/admin/main')->back()->with('message', 'IT WORKS!');
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
