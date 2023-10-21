<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class TestimonialController extends Controller
{
    public function testimonials()
    { 
        $select['testimonial'] = DB::table('tbl_testimonials')->orderBy('id','DESC')->get();
        return view('backend.testimonials',$select);
    }
    public function addtestimonials()
    {
        return view('backend.addtestimonial');
    }
    public function insert_testimonial(Request $request){
    $name=$request->input('name');
    //dd($name);
    $destination=$request->input('destination');
    $about=$request->input('about');
       
    if ($request->hasFile('brand_image')) {
        $image = $request->file('brand_image');
        $brand_image = time().'.'.$image->getClientOriginalExtension();
        $image->move("assets/testimonial_img/brand_img/", $brand_image);
        $brand_image = $brand_image;
 
     }else
     {
        $brand_image = "no file upload";
     }
     if ($request->hasFile('profile_img')) {
        $image2 = $request->file('profile_img');
        $profile_img = time().'.'.$image2->getClientOriginalExtension();
        $image2->move("assets/testimonial_img/profile_img/", $profile_img);
        $profile_img = $profile_img;
 
     }else
     {
        $profile_img = "no file upload";
     }
     $values = array(
        'name' => $name, 
        'destination'=>$destination, 
        'about' => $about, 
        'brand_image'=>$brand_image, 
        'profile_img'=>$profile_img,
        'status' =>1,
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s")
     );
    // dd($values);
    DB::table('tbl_testimonials')->insert($values);
    Session::flash('message','Testimonials Added Sucessfully.');
    return redirect('admin/testimonials');
    }

    public function show_testimonial()
    {
        $select['testimonial'] = DB::table('tbl_testimonials')->orderBy('id','DESC')->get();
        return view('backend.testimonial', $select);
    }
    public function delete_testimonial($id)
    {
        $testimonial = DB::table('tbl_testimonials')->where('id',$id)->delete();
        Session::flash('message','Data Deleted Sucessfully.');
        return redirect('admin/testimonials');
    }
    public function testimonial_edit_view($id)
    {
       $select['testimonial'] = DB::table('tbl_testimonials')->where('id', $id)->get();
       return view('backend.testimonial_edit_view', $select);
    }
    public function testimonial_edit(Request $request)
    {
     $id=$request->testimonials_id;
     $test_name=$request->input('name');
     //dd($name);
     $destination=$request->input('destination');
     $about=$request->input('about');
     if ($request->hasFile('brand_image')) {
        $image = $request->file('brand_image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move("assets/testimonial_img/brand_img/", $name);
        $brand_image = $name;
 
     }else
     {
        $brand_image = $request->brand_previous;
     }

     if ($request->hasFile('profile_img')) {
        $image = $request->file('profile_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move("assets/testimonial_img/profile_img/", $name);
        $profile_img = $name;
 
     }else
     {
        $profile_img = $request->profile_previous;
     }
     $values = array(
        'name' => $test_name, 
        'destination'=>$destination, 
        'about' => $about, 
        'brand_image'=>$brand_image, 
        'profile_img'=>$profile_img,
        'status' =>1,
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s")
     );
     //dd($values);
     DB::table('tbl_testimonials')->where('id', $id)->update($values);
     Session::flash('message','Record Updated Sucessfully.');
     return redirect('admin/testimonials');
    }

    public function testimonials_add_video()
    {
      return view('backend.testimonials_add_video');
    }

    public function insert_testimonial_video(Request $request)
    {
      if($request->testimonials_video_url=='' && $request->file('testimonial_video') == '')
      {
         return redirect('admin/testimonials_add_video?error=error');
      }
      else{
         if ($request->hasFile('testimonial_video')) {
            $testimonial_video = $request->file('testimonial_video');
            $name = time().'.'.$testimonial_video->getClientOriginalExtension();
            $testimonial_video->move("assets/testimonial_video/", $name);
            $videoName = $name;
         }else
         {
            $videoName = "no file upload";
         }
         $videoURL = $request->testimonials_video_url;
         if($videoURL == ""){
            $video_URL = "no video url";
         }else{
            $video_URL = $videoURL;
         }
         $values= array(
            'testimonial_video'=>$videoName,
            'testimonial_video_url'=>$video_URL,
            'status' =>1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s") 
         );
         // dd($values);
         DB::table('tbl_testi_vdo')->insert($values);
         Session::flash('message','Testimonial Video Added Sucessfully.');
         return redirect('admin/testimonials_show_video');
      }
      
    }

    public function testimonials_show_video()
    {
      $show_video['tvideo']=DB::table('tbl_testi_vdo')->orderBy('id','DESC')->get();
      return view('backend.testimonials_show_video',$show_video);
    }

    public function tstimonials_editvdo_view($id)
    {
      $select['editvdo'] = DB::table('tbl_testi_vdo')->where('id', $id)->get();
      return view('backend.tstimonials_editvdo_view',$select);
    }

    public function tstimonials_editvdo(Request $request)
    {
      $id=$request->editvdo_id;
      if($request->testimonials_video_url=='' && $request->file('new_vdo') == '')
      {
         return redirect('admin/tstimonials_editvdo_view/'.$id.'?error=error');
      }
      else{
         if ($request->hasFile('new_vdo')) {
            $testimonial_video = $request->file('new_vdo');
            $name = time().'.'.$testimonial_video->getClientOriginalExtension();
            $testimonial_video->move("assets/testimonial_video/", $name);
            $videoName = $name;
         }else
         {
            $videoName = "no file upload";
         }
         $videoURL = $request->testimonials_video_url;
         if($videoURL == ""){
            $video_URL = "no video url";
         }else{
            $video_URL = $videoURL;
         }
         $values= array(
            'testimonial_video'=>$videoName,
            'testimonial_video_url'=>$video_URL,
            'updated_at'=>date("Y-m-d H:i:s") 
         );
         // dd($values);
         DB::table('tbl_testi_vdo')->where('id',$id)->update($values);
         Session::flash('message','Testimonial Video Updated Sucessfully.');
         return redirect('admin/testimonials_show_video');
      }
    }

    public function testimonials_del_video($id)
    {
      $del_videos['tvideo']=DB::table('tbl_testi_vdo')->where('id',$id)->delete();
      Session::flash('message','Data Deleted Sucessfully.');
      return redirect('admin/testimonials_show_video');
    }
    public function add_lecture()
    {
       return view('backend.add_lecture');
    }
    public function tvdo_change_status($id){
      $tvdo = DB::table('tbl_testi_vdo')->select('status')->where('id','=',$id)->first();
      //Check alumni status
      if($tvdo->status == '1'){
          $status = 0;
          $statusName = "Inactive";
      }
      if($tvdo->status == '0'){
          $status = 1;
          $statusName = "Active";
      }
      $values = array('status' => $status );
      DB::table('tbl_testi_vdo')->where('id',$id)->update($values);

      Session::flash('message' , 'Status changed to ' .$statusName. ' successfully.');
      return redirect('admin/testimonials_show_video');
    }
}
