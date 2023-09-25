<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB,Auth,Cache;
use App\Models\blog;
use App\Models\video;

class BlogController extends Controller
{
     public function add_blog()
    {
        return view('blog.AddBlog');
    }

        public function blog_add(Request $req)
    {
          $image = $req->file('img');
          $new_name = '/blogs/'. time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('blogs'), $new_name);

                blog::create([
                'title'=>$req->name,
                'image'=>$new_name,
                'details'=>$req->desc,

            ]) ;
            $data['success']="success";
             echo json_encode($data);
       
    }

        public function blogs()
    {
        $blogs=blog::latest()->get();
        return view('blog.Blogs',['blogs'=>$blogs]);
    }

         public function delete_blog(Request $req)
    {
      
            blog::where('id',$req->body)->delete() ;
            $data['success']="success";
       
        echo json_encode($data);
       
    }

        public function edit_blog($bid)
    {
        $blogid=decrypt($bid);
        $blog=blog::where('id',$blogid)->first();
        return view('blog.EditBlog',['blog'=>$blog]);
    }

      public function blog_edit(Request $req)
    {
        $bg=blog::where('id',$req->bid)->first();
             $img = $req->file('img');
            if($img=='')
            {
                $new_name=$bg->image;
            }
            else{
                 $imgWillDelete = public_path() . '/blogs/' . $bg->image;
                File::delete($imgWillDelete);
                $image = $req->file('img');
                 $new_name = '/blogs/'. time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('blogs'), $new_name);
            }
                blog::where('id',$req->bid)->update([
                'title'=>$req->name,
                'image'=>$new_name,
                'details'=>$req->desc

            ]) ;
            $data['success']="success";
      
        echo json_encode($data);
       
    }


    ////////////////////////////


         public function add_video()
    {
        return view('blog.AddVideo');
    }

        public function video_add(Request $req)
    {
          
                video::create([
                'title'=>$req->name,
                'link'=>$req->url,
                'details'=>$req->desc,
            ]) ;
            $data['success']="success";
             echo json_encode($data);
       
    }

        public function videos()
    {
        $videos=video::latest()->get();
        return view('blog.Videos',['videos'=>$videos]);
    }

         public function delete_video(Request $req)
    {
      
            video::where('id',$req->body)->delete() ;
            $data['success']="success";
       
        echo json_encode($data);
       
    }

        public function edit_video($vid)
    {
        $videoid=decrypt($vid);
        $video=video::where('id',$videoid)->first();
        return view('blog.EditVideo',['video'=>$video]);
    }

      public function video_edit(Request $req)
    {
        
                video::where('id',$req->vid)->update([
              'title'=>$req->name,
              'link'=>$req->url,
              'details'=>$req->desc,

            ]) ;
            $data['success']="success";
      
        echo json_encode($data);
       
    }
}
