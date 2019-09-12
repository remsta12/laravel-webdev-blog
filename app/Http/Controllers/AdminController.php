<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
     *Pushes new data to post table
    **/
    public function addPostRecord(Request $request)
    {
      //update names of references to postForm_column when figure out way to merge the two modals
      $post = new Post;
      $authorid = $request->get('postaddForm-name');
      $post->author_id = $authorid;
      $authorname = User::where('id', $authorid)->value('name');
      $post->name = $authorname;
      $post->slug = $request->get('postaddForm-slug');
      $post->title = $request->get('postaddForm-title');
      $post->excerpt = $request->get('postaddForm-excerpt');
      $post->body = $request->get('postaddForm-body');
      $post->image = $request->get('postaddForm-image');
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

    }


    public function deletePostRecord(Request $request, $id){
      $postid = $request->get("postDeleteForm_id");
      $post = Post::where('id', $postid)->delete();
      return redirect()->action('AdminController@index')->with('success', 'Data Updated');
    }


    /**
     *Pushes new data to user table
    **/
    public function addUserRecord(Request $request)
    {
      //update names of references to postForm_column when figure out way to merge the two modals
      $user = new User;
      $user->name = $request->get('useraddForm-username');
      $user->email = $request->get('useraddForm-email');
      $user->password = Hash::make($request->get('useraddForm-pass'));
      $user->remember_token = $request->get('useraddForm-remtoken');
      $user->save();
      return redirect()->action('AdminController@user')->with('success', 'Data Updated');
    }

    public function editUserRecord(Request $request, $id){
        /**
        */
        $user = User::find($id);
        $user->name = $request->get('userForm-username');
        $user->email = $request->get('userForm-email');
        $user->password = Hash::make($request->get('userForm-pass'));
        $user->remember_token = $request->get('userForm-remtoken');
        $user->save();
        return redirect()->action('AdminController@user')->with('success', 'Data Updated');

    }


    public function deleteUserRecord(Request $request, $id){
      $userid = $request->get("userDeleteForm_id");
      $user = User::where('id', $userid)->delete();
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
