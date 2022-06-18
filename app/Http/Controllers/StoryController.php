<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\User;
use App\story;
use Image;

class StoryController extends Controller
{
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "site_url" => "required",
            'story_img' => 'mimes:jpeg,jpg,webp,png|max:2096'
        ], [
            "site_url.required" => __("Store URL is required"),
            "story_img.required" => __("Story Image is required")
        ]);

        $input = $request->all();

        // Img File to URL
        if ($file = $request->file('story_img')) {

            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/images/store/';
            $site_url = time() . $file->getClientOriginalName();
            // confirm dimensions of the story image here
            $optimizeImage->resize(1080, 1920, function ($constraint) {
                $constraint->aspectRatio();
            });
            $optimizeImage->save($optimizePath . $site_url, 90);

            $input['img_url'] = $site_url;

        }

        $input['likes'] = 0;
        $input['views'] = 0;

        // Get Store ID from some place.
        //$input['store_id'] = $input['store_id'];
        $input['store_url'] = $input['site_url'];
        // 'img_url', 'likes','views', 'store_id','store_url'
        $story = story::create($input);

        notify()->success(__('Story created !'),$story->id);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $story = story::find($id);

        if ($story) {

            if ($story->store_url != '' && file_exists(public_path() . '/images/store/' . $story->store_url)) {
                unlink(public_path() . '/images/store/' . $story->store_url);
            }

            $story->forcedelete();
            
            notify()->success(__('Story has been Deleted !'));
            return back();
             
        } else {
            notify()->error(__('Story Not found !'),'404');
            return back();
        }
    }
}
