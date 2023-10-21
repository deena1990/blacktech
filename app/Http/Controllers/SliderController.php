<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Session;

class SliderController extends Controller
{
    public function add_slider()
    {
        return view('backend.add_slider');
    }
    public function insert_slider(Request $request)
    {
        $heading=$request->input('heading');
        $about=$request->input('about');
        $btn_name=$request->input('btn_name');
        $btn_link=$request->input('btn_link');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_slider/", $name);
            $sliderName = $name;
     
         }else
         {
            $sliderName = "no file upload";
         }
        $values=array(
           'heading' => $heading,
           'about' => $about,
           'image' => $sliderName,
           'btn_name' => $btn_name,
           'btn_link' => $btn_link,
           'status' =>1,
           'created_at'=>date("Y-m-d H:i:s"),
           'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_slider')->insert($values);
        Session::flash('message','Slider added sucessfully');
        return redirect('admin/show_slider');
    }

    public function show_slider()
    {
        $data['slider']=DB::table('tbl_slider')->orderBy('id','DESC')->get();
        return view('backend.show_slider',$data);
    }
    public function del_slider($id)
    {
        $slider=DB::table('tbl_slider')->where('id',$id)->delete();
        Session::flash('message','Slider deleted sucessfully.');
        return redirect('admin/show_slider');
    }
    public function edt_sliderv($id)
    {
        $data['slider']=DB::table('tbl_slider')->where('id',$id)->get();
        return view('backend.edt_sliderv',$data);
    }
    public function edt_slider(Request $request)
    {
        // $image=$request->image;
        // dd($image);
        $id=$request->slider_id;
        $heading=$request->input('heading');
        $about=$request->input('about');
        $btn_name=$request->input('btn_name');
        $btn_link=$request->input('btn_link');
        if ($request->hasFile('new_slider')) {
            $new_slider = $request->file('new_slider');
            $name = time().'.'.$new_slider->getClientOriginalExtension();
            $new_slider->move("assets/upload_slider/", $name);
            $sliderName = $name;
     
         }else
         {
            $sliderName = "$request->image";
         }
        $values=array(
           'heading' => $heading,
           'about' => $about,
           'image' => $sliderName,
           'btn_name' => $btn_name,
           'btn_link' => $btn_link,
           'status' =>1,
           'created_at'=>date("Y-m-d H:i:s"),
           'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_slider')->where('id', $id)->update($values);
        Session::flash('message','Slider updated sucessfully.');
        return redirect('admin/show_slider');
    }
    public function slider_change_status($id)
    {
        $slider = DB::table('tbl_slider')->select('status')->where('id','=',$id)->first();
        //Check alumni status
        if($slider->status == '1'){
            $status = 0;
        }
        if($slider->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_slider')->where('id',$id)->update($values);

        Session::flash('message' , 'Status updated sucessfully');
        return redirect('admin/show_slider');
    }
    
    public function add_team()
    {
        return view('backend.add_team');
    }
    public function show_team()
    {
        $data['team']=DB::table('tbl_team')->orderBy('position_id','ASC')->get();
        return view('backend.show_team',$data);
    }
    public function insert_team(Request $request)
    {
        if ($request->hasFile('new_team')) {
            $new_team = $request->file('new_team');
            $name = time().'.'.$new_team->getClientOriginalExtension();
            $new_team->move("assets/upload_team/", $name);
            $teamName = $name;
     
        }else
        {
            $teamName = "pre_slider";
        }
        $name=$request->input('name');
        $role=$request->input('role');
        $values=array(
            'image' => $teamName,
            'name'  => $name,
            'role' => $role,
            'status' =>1,
            'created_at' =>date("y-m-d H:i:s"),
            'updated_at' =>date("y-m-d H:i:s")
        );
        //dd($values);
        $team_data=DB::table('tbl_team')->insert($values);
        Session::flash('message','Team added sucessfully');
        return redirect('admin/show_team');
    }
    public function del_team($id)
    {
     $data['team']=DB::table('tbl_team')->where('id',$id)->delete();
     Session::flash('message','Team deleted sucessfully.');
     return redirect('admin/show_team');
    }
    public function edt_teamv($id)
    {
      $data['team']=DB::table('tbl_team')->where('id',$id)->get();
      return view('backend.edt_teamv',$data);
    }
    public function edt_team(Request $request)
    {
        $id=$request->team_id;
        $pre_team=$request->pre_team;
        if ($request->hasFile('new_team')) {
            $new_team = $request->file('new_team');
            $name = time().'.'.$new_team->getClientOriginalExtension();
            $new_team->move("assets/upload_team/", $name);
            $teamName = $name;
     
        }else
        {
            $teamName = "$pre_team";
        }
        $name=$request->input('name');
        $role=$request->input('role');
        $values=array(
            'image' => $teamName,
            'name'  => $name,
            'role' => $role,
            'status' =>1,
            'created_at' =>date("y-m-d H:i:s"),
            'updated_at' =>date("y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_team')->where('id', $id)->update($values);
        Session::flash('message','Team updated sucessfully.');
        return redirect('admin/show_team');
    }
    public function show_section1()
    {
        $section_one=DB::table('tbl_ab_section1')->orderBy('id','DESC')->get();
        return view('backend.show_section1', compact('section_one'));
    }
    public function insert_absection1(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "no file upload";
         }
        $title=$request->input('title');
        $description=$request->input('description');
        $values=array(
            'image' => $imageName,
            'title' => $title,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        //dd($values);
        DB::table('tbl_ab_section1')->insert($values);
        Session::flash('message' , 'About Us Section 1 added sucessfully');
        return redirect('admin/show_section1');
    }
    public function edt_sec1v($id)
    {
        $data['ausec1']=DB::table('tbl_ab_section1')->where('id',$id)->first();
        return view('backend.edt_sec1v',$data);
    }
    public function save_edt_sec1v (Request $request)
    {
        $id=$request->ausec1_id;
        $title=$request->input('title');
        $description=$request->input('description');
        if ($request->hasFile('new_ausec1_image1')) {
            $new_image1 = $request->file('new_ausec1_image1');
            $name1 = time().'.'.$new_image1->getClientOriginalExtension();
            $new_image1->move("assets/upload_aboutus/", $name1);
            $imageName1 = $name1;
        }else{ $imageName1 = "$request->image1"; }
        if ($request->hasFile('new_ausec1_image2')) {
            $new_image2 = $request->file('new_ausec1_image2');
            $name2 = time().'.'.$new_image2->getClientOriginalExtension();
            $new_image2->move("assets/upload_aboutus/", $name2);
            $imageName2 = $name2;
        }else{ $imageName2 = "$request->image2"; }
        $values=array(
            'title' => $title,
            'description' => $description,
            'image1' => $imageName1,
            'image2' => $imageName2,
            'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_ab_section1')->where('id', $id)->update($values);
        Session::flash('message','About Us Section 1 updated sucessfully.');
        return redirect('admin/show_section1');
    }
    public function del_sec1($id)
    {
     $data['sec1']=DB::table('tbl_ab_section1')->where('id',$id)->delete();
     Session::flash('message','About Us Section 1 deleted sucessfully.');
     return redirect('admin/show_section1'); 
    }
    public function sec1_chnge_status($id)
    {
        $section_ones = DB::table('tbl_ab_section1')->select('status')->where('id','=',$id)->first();
        if($section_ones->status == '1'){
            $status = 0;
        }
        if($section_ones->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_ab_section1')->where('id',$id)->update($values);
        Session::flash('message' , 'About Us Section 1 updated sucessfully');
        return redirect('admin/show_section1');
    }
    public function show_section2()
    {
        $data['section2']=DB::table('tbl_ab_section2')->orderBy('id','DESC')->get();
        return view('backend.show_section2', $data);
    }
    public function insert_absection2(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $sliderName = $name;
     
         }else
         {
            $sliderName = "no file upload";
         }
        $title=$request->input('title');
        $description=$request->input('description');
        $values=array(
            'image' => $sliderName,
            'title' => $title,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        //dd($values);
        $second_section=DB::table('tbl_ab_section2')->insert($values);
        Session::flash('message' , 'About Us Section 2 added sucessfully');
        return redirect('admin/show_section2');
    }
    public function edt_sec2v($id)
    {
        $data['ausec2']=DB::table('tbl_ab_section2')->where('id',$id)->first();
        return view('backend.edt_sec2v',$data);
    }
    public function save_edt_sec2v (Request $request)
    {
        $id=$request->ausec2_id;
        $title=$request->input('title');
        $description=$request->input('description');
        if ($request->hasFile('new_ausec2')) {
            $new_image = $request->file('new_ausec2');
            $name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move("assets/upload_aboutus/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "$request->image";
         }
        $values=array(
            'title' => $title,
            'description' => $description,
            'image' => $imageName,
            'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_ab_section2')->where('id', $id)->update($values);
        Session::flash('message','About Us Section 2 updated sucessfully.');
        return redirect('admin/show_section2');
    }
    public function del_sec2($id)
    {
        $data['sec2']=DB::table('tbl_ab_section2')->where('id',$id)->delete();
        Session::flash('message','About Us Section 2 deleted sucessfully.');
        return redirect('admin/show_section2'); 
    }
    public function sec2_chnge_status($id)
    {
        $section2 = DB::table('tbl_ab_section2')->select('status')->where('id','=',$id)->first();
        if($section2->status == '1'){
            $status = 0;
        }
        if($section2->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_ab_section2')->where('id',$id)->update($values);
        Session::flash('message' , 'Status updated sucessfully.');
        return redirect('admin/show_section2');
    }
    public function show_section3()
    {
        $data['section3']=DB::table('tbl_ab_section3')->orderBy('id','DESC')->get();
        return view('backend.show_section3',$data);
    }
    public function insert_absection3(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $sliderName = $name;
     
         }else
         {
            $sliderName = "no file upload";
         }
        $title=$request->input('title');
        $description=$request->input('description');
        $values=array(
            'image' => $sliderName,
            'title' => $title,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        //dd($values);
        $second_section=DB::table('tbl_ab_section3')->insert($values);
        Session::flash('message' , 'About Us Section 3 added sucessfully');
        return redirect('admin/show_section3');
    }
    public function edt_sec3v($id)
    {
        $data['ausec3']=DB::table('tbl_ab_section3')->where('id',$id)->first();
        return view('backend.edt_sec3v',$data);
    }
    public function save_edt_sec3v (Request $request)
    {
        $id=$request->ausec3_id;
        $title=$request->input('title');
        $description=$request->input('description');
        if ($request->hasFile('new_ausec3')) {
            $new_image = $request->file('new_ausec3');
            $name = time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move("assets/upload_aboutus/", $name);
            $imageName = $name;
     
         }else
         {
            $imageName = "$request->image";
         }
        $values=array(
            'title' => $title,
            'description' => $description,
            'image' => $imageName,
            'updated_at'=>date("Y-m-d H:i:s")
        );
        //dd($values);
        DB::table('tbl_ab_section3')->where('id', $id)->update($values);
        Session::flash('message','About Us Section 3 updated sucessfully.');
        return redirect('admin/show_section3');
    }
    public function del_sec3($id)
    {
        $data['sec3']=DB::table('tbl_ab_section3')->where('id',$id)->delete();
        Session::flash('message','About Us Section 3 deleted sucessfully.');
        return redirect('admin/show_section3'); 
    }
    public function sec3_chnge_status($id)
    {
        $section3 = DB::table('tbl_ab_section3')->select('status')->where('id','=',$id)->first();
        if($section3->status == '1'){
            $status = 0;
        }
        if($section3->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_ab_section3')->where('id',$id)->update($values);
        Session::flash('message' , 'Status updated sucessfully.');
        return redirect('admin/show_section3');
    }
    public function show_alumni()
    {
      $data['alumni']=DB::table('tbl_alumni')->orderBy('id','DESC')->get();
      return view('backend.show_alumni',$data);
    }
    public function insert_alumni(Request $request)
    {
     $tname = $request->input('name');
     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $image->move("assets/upload_aboutus/", $name);
        $imgName = $name;
 
     }else
     {
        $imgName = "no file upload";
     }
     $values=array(
        'image' => $imgName,
        'name' => $tname,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
     );
     //dd($values);
    $data['alumni']=DB::table('tbl_alumni')->insert($values);
    Session::flash('message' , 'Alumni added sucessfully');
    return redirect('admin/show_alumni');
    }
    public function del_alumni($id)
    {
        $data['alumni']=DB::table('tbl_alumni')->where('id',$id)->delete();
        Session::flash('message','Alumni deleted Sucessfully.');
        return redirect('admin/show_alumni');  
    }
    public function edt_alumniv($id)
    {
        $data['alumni']=DB::table('tbl_alumni')->where('id',$id)->get();
        return view('backend.edt_alumniv',$data);
    }
    public function edt_alumni(Request $request)
    {
        $id=$request->alumni_id;
        $pre_image=$request->pre_image;
        $tname = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $imgName = $name;
    
        }else
        {
            $imgName = "$request->pre_image";
        }
     $values=array(
        'image' => $imgName,
        'name' => $tname,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
     );
    //dd($values);
    $data['alumni']=DB::table('tbl_alumni')->where('id',$id)->where('status',1)->update($values);
    Session::flash('message' , 'Alumni updated sucessfully');
    return redirect('admin/show_alumni');
    }
    function status_update($id)
    {
        $alumni = DB::table('tbl_alumni')->select('status')->where('id','=',$id)->first();
        //Check alumni status
        if($alumni->status == '1'){
            $status = 0;
        }
        if($alumni->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_alumni')->where('id',$id)->update($values);

        Session::flash('message' , 'Status updated sucessfully');
        return redirect('admin/show_alumni');
    }
    public function show_recupartners()
    {
        $data['recupartner']=DB::table('tbl_recupartners')->orderBy('id','DESC')->get();
        return view('backend.show_recupartners',$data);
    }
    public function insert_recupartners(Request $request)
    {
        $tname = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $imgName = $name;
    
        }else
        {
            $imgName = "no file upload";
        }
        $values=array(
            'image' => $imgName,
            'name' => $tname,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
     //dd($values);
    $data['recupartner']=DB::table('tbl_recupartners')->insert($values);
    Session::flash('message' , 'Recruiting Partner added sucessfully');
    return redirect('admin/show_recupartners');
    }
    public function del_recupartners($id)
    {
        $data['recupartner']=DB::table('tbl_recupartners')->where('id',$id)->delete();
        Session::flash('message','Recruiting Partner deleted sucessfully.');
        return redirect('admin/show_recupartners');  
    }
    public function edt_recupartnersv($id)
    {
        $data['recupartner']=DB::table('tbl_recupartners')->where('id',$id)->get();
        return view('backend.edt_recupartnersv',$data); 
    }
    public function edt_recupartners(Request $request)
    {
        $id=$request->recupartner_id;
        $pre_image=$request->pre_image;
        $tname = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $image->move("assets/upload_aboutus/", $name);
            $imgName = $name;
    
        }else
        {
            $imgName = "$request->pre_image";
        }
     $values=array(
        'image' => $imgName,
        'name' => $tname,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
     );
    //dd($values);
    $data['recupartner']=DB::table('tbl_recupartners')->where('id',$id)->where('status',1)->update($values);
    Session::flash('message' , 'Recruiting Partner updated sucessfully');
    return redirect('admin/show_recupartners');  
    }
    public function restatus_update($id)
    {
        $recupartners = DB::table('tbl_recupartners')->select('status')->where('id','=',$id)->first();
        //Check alumni status
        if($recupartners->status == '1'){
            $status = 0;
        }
        if($recupartners->status == '0'){
            $status = 1;
        }
        $values = array('status' => $status );
        DB::table('tbl_recupartners')->where('id',$id)->update($values);

        Session::flash('message' , 'Status updated sucessfully');
        return redirect('admin/show_recupartners');
    }

    public function show_forbes_section(){
        $data['forbes_section']=DB::table('tbl_forbes_section')->first();
        return view('backend.edt_forbes_section',$data);
    }

    public function edit_forbes_section(Request $request){
        // dd($request->all());
        $id = $request->forbes_section_id;
        $content = $request->content;
        if($request->hasFile('file')){
            $image = $request->file('file');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/upload_aboutus/',$imageName);
        }else{
            $imageName = "$request->pre_file";
        }
        $update = [
            'file' => $imageName,
            'content' => $content,
            'status' => 1,
        ];
        DB::table('tbl_forbes_section')->where('id',$id)->update($update);
        Session::flash('message' , 'Forbes Section updated sucessfully !!');
        return redirect('admin/show_forbes_section');
    }

    public function show_banner(){
        $data['banners']=DB::table('tbl_ab_section1')->first();
        return view('backend.edt_banner',$data);
    }

    public function edit_banners(Request $request){
        // dd($request->all());
        $banner_id = $request->banner_id;
        if($request->hasFile('new_image0')){
            $new_image0 = $request->file('new_image0');
            $imageName0 = time().'.'.$new_image0->getClientOriginalExtension();
            $new_image0->move('assets/upload_aboutus/',$imageName0);
        }else{
            $imageName0 = "$request->image0";
        }
        if($request->hasFile('new_image1')){
            $new_image1 = $request->file('new_image1');
            $imageName1 = time().'.'.$new_image1->getClientOriginalExtension();
            $new_image1->move('assets/upload_aboutus/',$imageName1);
        }else{
            $imageName1 = "$request->image1";
        }
        if($request->hasFile('new_image2')){
            $new_image2 = $request->file('new_image2');
            $imageName2 = time().'.'.$new_image2->getClientOriginalExtension();
            $new_image2->move('assets/upload_aboutus/',$imageName2);
        }else{
            $imageName2 = "$request->image2";
        }
        if($request->hasFile('new_image3')){
            $new_image3 = $request->file('new_image3');
            $imageName3 = time().'.'.$new_image3->getClientOriginalExtension();
            $new_image3->move('assets/upload_aboutus/',$imageName3);
        }else{
            $imageName3 = "$request->image3";
        }
        if($request->hasFile('new_image4')){
            $new_image4 = $request->file('new_image4');
            $imageName4 = time().'.'.$new_image4->getClientOriginalExtension();
            $new_image4->move('assets/upload_aboutus/',$imageName4);
        }else{
            $imageName4 = "$request->image4";
        }
        if($request->hasFile('new_image5')){
            $new_image5 = $request->file('new_image5');
            $imageName5 = time().'.'.$new_image5->getClientOriginalExtension();
            $new_image5->move('assets/upload_aboutus/',$imageName5);
        }else{
            $imageName5 = "$request->image5";
        }
        if($request->hasFile('new_image6')){
            $new_image6 = $request->file('new_image6');
            $imageName6 = time().'.'.$new_image6->getClientOriginalExtension();
            $new_image6->move('assets/upload_aboutus/',$imageName6);
        }else{
            $imageName6 = "$request->image6";
        }
        if($request->hasFile('new_image7')){
            $new_image7 = $request->file('new_image7');
            $imageName7 = time().'.'.$new_image7->getClientOriginalExtension();
            $new_image7->move('assets/upload_aboutus/',$imageName7);
        }else{
            $imageName7 = "$request->image7";
        }
        if($request->hasFile('new_image8')){
            $new_image8 = $request->file('new_image8');
            $imageName8 = time().'.'.$new_image8->getClientOriginalExtension();
            $new_image8->move('assets/upload_aboutus/',$imageName8);
        }else{
            $imageName8 = "$request->image8";
        }
        if($request->hasFile('new_image9')){
            $new_image9 = $request->file('new_image9');
            $imageName9 = time().'.'.$new_image9->getClientOriginalExtension();
            $new_image9->move('assets/upload_aboutus/',$imageName9);
        }else{
            $imageName9 = "$request->image9";
        }
        $status = $imageName0.':::'.$imageName1.':::'.$imageName2.':::'.$imageName3.':::'.$imageName4.':::'.$imageName5.':::'.$imageName6.':::'.$imageName7.':::'.$imageName8.':::'.$imageName9;
        $update = [
            'status' => $status
        ];
        DB::table('tbl_ab_section1')->where('id',$banner_id)->update($update);
        Session::flash('message' , 'Banner updated sucessfully');
        return redirect('admin/show_banner');
    }
}