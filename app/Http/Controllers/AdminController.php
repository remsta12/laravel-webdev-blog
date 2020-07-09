<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Post;
use App\User;
use App\Role;
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
      $users = User::get();
      $posts = Post::latestFirst()->published()->get();
      return view("dashboard")->with("posts", $posts)->with("users", $users);
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
    * Display a listing of the roles table
    **/
    public function role(){
      $roles = Role::get();
      return view("roledash")->with("roles", $roles);
    }

    /**
     *Pushes new data to post table
    **/
    public function addPostRecord(Request $request)
    {
      //update names of references to postForm_column when figure out way to merge the two modals
      $post = new Post;
      $authorid = $request->get('postaddForm_authorid');
      $postbody = $request->get('postaddForm-body');
      $postbody = addslashes($postbody);
      $post->author_id = $authorid;
      $authorname = User::where('id', $authorid)->value('name');
      $post->name = $authorname;
      $post->slug = $request->get('postaddForm-slug');
      $post->title = $request->get('postaddForm-title');
      $post->excerpt = $request->get('postaddForm-excerpt');
      $post->body = $postbody;
      $post->image = $request->get('postaddForm-image');
      $post->save();
      return redirect()->action('AdminController@index')->with('success', 'Data Updated');
    }

    public function editPostRecord(Request $request, $id){
        /**
          * Takes values located in respective form input boxes then saves to DB
        */
        $post = Post::find($id);
        $postbody = $request->get('postForm-body');
        $postbody =  addslashes($postbody);
        $post->name = $request->get('postForm-name');
        $post->slug = $request->get('postForm-slug');
        $post->title = $request->get('postForm-title');
        $post->excerpt = $request->get('postForm-excerpt');
        $post->body = $postbody;
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
      $userRole = $request->get('useraddForm-role');
      $role_regular_user = Role::where('name', 'regular')->first();
      $role_admin_user = Role::where('name', 'admin')->first();

      //update names of references to postForm_column when figure out way to merge the two modals
      $user = new User;
      $user->name = $request->get('useraddForm-username');
      $user->email = $request->get('useraddForm-email');
      $user->password = Hash::make($request->get('useraddForm-pass'));
      $user->remember_token = $request->get('useraddForm-remtoken');
      if($userRole == 'Regular'){
        $user->roles()->attach($role_regular_user);
      } else{
        $user->roles()->attach($role_admin_user);
      }
      $user->save();
      return redirect()->action('AdminController@user')->with('success', 'Data Updated');
    }

    public function editUserRecord(Request $request, $id){
        /**
        */
        $userRole = $request->get('editForm-role');

        $role_regular_user = Role::where('name', 'regular')->first();
        $role_admin_user = Role::where('name', 'admin')->first();

        $password = $request->get('editForm-pass');

        $user = User::find($id);
        $user->name = $request->get('editForm-username');
        $user->email = $request->get('editForm-email');
        if(!empty($password)){
            $user->password = bcrypt($password);
        }
        $user->remember_token = $request->get('editForm-remtoken');
        if($userRole == 'Regular'){
          $user->roles()->attach($role_regular_user);
        } else{
          $user->roles()->attach($role_admin_user);
        }
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
