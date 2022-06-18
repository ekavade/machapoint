<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\User;
use App\story;
use App\story_like;
use DB;

class StoryLikeController extends Controller
{
    public function like($id) {

    $stories = story::where('store_id', $id)->get();
    // find story_view where story_id == $id and current user is == user_id or ip_address == ip_address
    $current_user = auth()->user()->id ?? null;
    foreach($stories as $story){
      $story_like = '';
      if($current_user)
        $story_like = story_like::where('story_id', $story->id)->where('user_id', $current_user)->first();
      else
       $story_like = story_like::where('story_id',$story->id)->where('user_id', $current_user)->where('ip_address', request()->ip())->first();

      if(!$story_like) {
        $story_like = new story_like;
        $story_like->user_id = $current_user;
        $story_like->ip_address = request()->ip();
        $story_like->story_id = $story->id;
        $story_like->save();
        // increment a like in the story
        $story->likes = $story->likes + 1;
        $story->save();
      }
    }

    // return the updated story
    return response()->json([
        'status' => '1',
        'message' => 'Successfully',
        'story' => $story
    ]);
	}

    public function unlike($id) {

      $stories = story::where('store_id', $id)->get();
      // find story_view where story_id == $id and current user is == user_id or ip_address == ip_address
      $current_user = auth()->user()->id ?? null;
      foreach($stories as $story){
        $story_like = '';
        if($current_user)
          $story_like = story_like::where('story_id', $story->id)->where('user_id', $current_user)->first();
        else
         $story_like = story_like::where('story_id',$story->id)->where('user_id', $current_user)->where('ip_address', request()->ip())->first();
  
        if(!$story_like) {
          // Delete story_like 
          $story_like->delete();
          
          // decrement a like in the story
          if($story->likes > 0)
            $story->likes = $story->likes - 1;
          else
            $story->likes = 0;  

          $story->save();
        }
      }

      return response()->json([
          'status' => '1',
          'message' => 'Successfully',
          'story' => $story
      ]);
		
	}
}
