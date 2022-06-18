<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Store;
use App\User;
use App\story;
use App\story_view;
use DB;

class StoryViewController extends Controller
{
    public function view($id) {
      // find stories where store_id = id
      $stories = story::where('store_id', $id)->get();
      // find story_view where story_id == $id and current user is == user_id or ip_address == ip_address
      $current_user = auth()->user()->id ?? null;
      foreach($stories as $story){
        $story_view = '';
        if($current_user)
          $story_view = story_view::where('story_id', $story->id)->where('user_id', $current_user)->first();
        else
         $story_view = story_view::where('story_id',$story->id)->where('user_id', $current_user)->where('ip_address', request()->ip())->first();

        if(!$story_view) {
          $story_view = new story_view;
          $story_view->user_id = $current_user;
          $story_view->ip_address = request()->ip();
          $story_view->story_id = $story->id;
          $story_view->save();
          // increment a like in the story
          $story->views = $story->views + 1;
          $story->save();
        }
      }

      // return the updated story
      return response()->json([
          'status' => '1',
          'message' => 'Successfully',
          'ip_address' => request()->ip(),
          'user_id' => $current_user
      ]);
	}
}
