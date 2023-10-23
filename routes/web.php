<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\SliderController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\CourseController;

use App\Http\Controllers\TestimonialController;

use App\Http\Controllers\EventController;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



// Route::get('/', function () {

//     return view('welcome');

// });

Route::get('/clear-cache', function() {



    $exitCode = Artisan::call('cache:clear');



    $exitCode = Artisan::call('config:cache');



    //$exitCode = Artisan::call('storage:link', [] );



    return 'DONE'; //Return anything







 });



// Frontend Route



Route::get('/',[HomeController::class,'index']);

// Route::get('/test',[HomeController::class,'test']);

Route::get('/courses',[HomeController::class,'courses']);

Route::get('/fwpaymentStatus',[HomeController::class,'fwpaymentStatus']);

Route::any('/course/{course_name}',[HomeController::class,'coursedescription']);

Route::post('/apply_coupon',[HomeController::class,'apply_coupon']); //Deena

Route::post('/course-registration/{course_name}',[HomeController::class,'course_res_about_u']);

Route::get('/course-registration/{course_name}/{id}',[HomeController::class,'course_res_about_u1']);

Route::get('/about',[HomeController::class,'about']);

Route::get('/events',[HomeController::class,'joinevent']);

Route::post('/event/{event_name}',[HomeController::class,'event_description']);

Route::get('/event-registration/{event_name}',[HomeController::class,'event_registration']);

Route::post('/insert_registration',[HomeController::class,'insert_registration']);

Route::get('/send_event_reminder_email',[HomeController::class,'send_event_reminder_email']);  //Deena

Route::post('admin/send_event_reminder',[AdminController::class,'send_event_reminder']);  //Deena

Route::get('/referafrnd',[HomeController::class,'referafrnd']);

Route::post('/insert_referafrnd',[HomeController::class,'insert_referafrnd']);

Route::get('/testimonials',[HomeController::class,'testimonials']);

Route::get('/contactus',[HomeController::class,'contactus']);

Route::get('/community',[HomeController::class,'get_started']);

Route::get('/hreoalumni',[HomeController::class,'hreoalumni']);

Route::post('/insert_hreoalumni',[HomeController::class,'insert_hreoalumni']);

Route::get('/apply',[HomeController::class,'apply']);

Route::get('/cnt_email',[HomeController::class,'cnt_email']);



Route::get('/terms',[HomeController::class,'terms']);

Route::get('/privacy',[HomeController::class,'privacy']);

Route::get('/rescheduling',[HomeController::class,'rescheduling']);

Route::get('/refund',[HomeController::class,'refund']);



Route::post('/insert_evntdesc',[HomeController::class,'insert_evntdesc']);



Route::post('/insert_advisor',[HomeController::class,'insert_advisor']);





Route::post('/updateTeamOrder',[HomeController::class,'updateTeamOrder']);//Deena

Route::post('/updateCourseOrder',[HomeController::class,'updateCourseOrder']);//Deena



Route::post('/postPaymentWithpaypal',[HomeController::class,'postPaymentWithpaypal']);//Deena

Route::get('/paypalPaymentStatus',[HomeController::class,'getPaymentStatus']);//Deena





Route::post('/contact_insert',[HomeController::class,'contact_insert']);

Route::get('/stripess',[HomeController::class,'stripess']);

Route::post('/stripePost',[HomeController::class,'stripePost'])->name('stripe.post');

Route::get('/coming_soon',[HomeController::class,'coming_soon']);

Route::post('/insert_signin',[HomeController::class,'insert_signin']);

Route::post('/insert_course_outline',[HomeController::class,'insert_course_outline']); //Code by Deena Nath

Route::post('/insert_subscriber',[HomeController::class,'insert_subscriber']); //Code by Deena Nath



Route::post('/search_course_type',[HomeController::class,'search_course_type']);





// Backend Route



Route::get('/admin',[AdminController::class,'login']);

Route::post('/admin/login',[AdminController::class,'dashboard']);



Route::middleware(['middleware'=>'Admin'])->group(function(){



Route::get('/admin/dashboard',[AdminController::class,'admin_index'])->name('/admin/dashboard');

Route::get('/admin/logout',[AdminController::class,'logout']);

Route::get('/admin/admin_contact',[AdminController::class,'admin_contact']);

Route::get('/admin/contact_list',[AdminController::class,'contact_list']);

Route::get('/admin/user_profile',[AdminController::class,'user_profile']);

Route::get('/admin/search',[AdminController::class,'search']);



Route::get('/admin/career_advisor',[AdminController::class,'career_advisor']);

Route::get('/admin/hreoalumni_list',[AdminController::class,'hreoalumni_list']);

Route::post('/admin/insert_ftr_cnt',[AdminController::class,'insert_ftr_cnt']);



Route::get('/admin/hreoalumni_talent_list',[AdminController::class,'hreoalumni_talent_list']);

Route::post('admin/insert_alumni_talent',[AdminController::class,'insert_alumni_talent']);

Route::get('admin/del_alumni_talent/{id}',[AdminController::class,'del_alumni_talent']);

Route::get('admin/edt_alumniv_talent/{id}',[AdminController::class,'edt_alumniv_talent']);

Route::post('admin/edt_alumni_talent',[AdminController::class,'edt_alumni_talent']);

Route::get('admin/talent_status_update/{id}',[AdminController::class,'talent_status_update']);



Route::get('/admin/edt_course_terms_privacy',[AdminController::class,'edt_course_terms_privacy']);

Route::post('admin/save_course_terms_privacy',[AdminController::class,'save_course_terms_privacy']);



Route::get('/admin/show_stpartners',[AdminController::class,'show_stpartners']);

Route::post('/admin/insert_stpartners',[AdminController::class,'insert_stpartners']);

Route::get('/admin/del_stpartners/{id}',[AdminController::class,'del_stpartners']);

Route::get('/admin/edit_stpartnersv/{id}',[AdminController::class,'edit_stpartnersv']);

Route::post('/admin/edit_stpartners',[AdminController::class,'edit_stpartners']);



Route::get('/admin/show_ldingcompns',[AdminController::class,'show_ldingcompns']);

Route::post('/admin/insert_ldingcompns',[AdminController::class,'insert_ldingcompns']);

Route::get('/admin/del_ldingcompns/{id}',[AdminController::class,'del_ldingcompns']);

Route::get('/admin/edit_ldingcompnv/{id}',[AdminController::class,'edit_ldingcompnv']);

Route::post('/admin/edit_ldingcompns',[AdminController::class,'edit_ldingcompns']);



Route::get('/admin/show_reviews',[AdminController::class,'show_reviews']);

Route::post('/admin/insert_reviews',[AdminController::class,'insert_reviews']);

Route::get('/admin/del_reviews/{id}',[AdminController::class,'del_reviews']);

Route::get('/admin/edt_reviewsv/{id}',[AdminController::class,'edt_reviewsv']);

Route::post('/admin/edt_reviews',[AdminController::class,'edt_reviews']);



Route::get('/admin/referafrnd_list',[AdminController::class,'referafrnd_list']);

Route::get('/admin/signin_list',[AdminController::class,'signin_list']);

Route::get('/admin/eventr_list',[AdminController::class,'eventr_list']);

Route::get('/admin/courser_list',[AdminController::class,'courser_list']);//Deena

Route::get('/admin/3months_payment',[AdminController::class,'three_months_payment']);//Deena

Route::get('/admin/2months_payment',[AdminController::class,'two_months_payment']);//Deena

Route::get('/admin/course_outline_list',[AdminController::class,'course_outline_list']); //Deena

Route::get('/admin/subscriber_list',[AdminController::class,'subscriber_list']);//Deena



//Home Page Route



// Route::get('/admin/add_slider',[SliderController::class,'add_slider']);

Route::get('/admin/show_banner',[SliderController::class,'show_banner']);//Deena

Route::get('/admin/show_forbes_section',[SliderController::class,'show_forbes_section']);//Deena

Route::post('/admin/edit_banners',[SliderController::class,'edit_banners']);//Deena

Route::post('/admin/edit_forbes_section',[SliderController::class,'edit_forbes_section']);//Deena

Route::post('/admin/insert_slider',[SliderController::class,'insert_slider']);

Route::get('/admin/show_slider',[SliderController::class,'show_slider']);

Route::get('/admin/edt_sliderv/{id}',[SliderController::class,'edt_sliderv']);

Route::post('/admin/edt_slider',[SliderController::class,'edt_slider']);

Route::get('/admin/del_slider/{id}',[SliderController::class,'del_slider']);

Route::get('/admin/slider_change_status/{id}',[SliderController::class,'slider_change_status']);



//About us Route

// Route::get('/admin/show_section1',[SliderController::class,'show_section1']);

Route::post('/admin/insert_absection1',[SliderController::class,'insert_absection1']);

Route::get('/admin/del_sec1/{id}',[SliderController::class,'del_sec1']);

// Route::get('/admin/edt_sec1v/{id}',[SliderController::class,'edt_sec1v']);//Deena
Route::get('/admin/show_section1',[SliderController::class,'edt_sec1v']);//Deena

Route::post('/admin/save_edt_sec1v',[SliderController::class,'save_edt_sec1v']); //Deena

Route::get('/admin/sec1_chnge_status/{id}',[SliderController::class,'sec1_chnge_status']);



// Route::get('/admin/show_section2',[SliderController::class,'show_section2']);

Route::post('/admin/insert_absection2',[SliderController::class,'insert_absection2']);

Route::get('/admin/del_sec2/{id}',[SliderController::class,'del_sec2']);

// Route::get('/admin/edt_sec2v/{id}',[SliderController::class,'edt_sec2v']);//Deena
Route::get('/admin/show_section2',[SliderController::class,'edt_sec2v']);//Deena

Route::post('/admin/save_edt_sec2v',[SliderController::class,'save_edt_sec2v']); //Deena

Route::get('/admin/sec2_chnge_status/{id}',[SliderController::class,'sec2_chnge_status']);//Deena



// Route::get('/admin/show_section3',[SliderController::class,'show_section3']);

Route::post('/admin/insert_absection3',[SliderController::class,'insert_absection3']);

Route::get('/admin/del_sec3/{id}',[SliderController::class,'del_sec3']);

// Route::get('/admin/edt_sec3v/{id}',[SliderController::class,'edt_sec3v']);//Deena
Route::get('/admin/show_section3',[SliderController::class,'edt_sec3v']);//Deena

Route::post('/admin/save_edt_sec3v',[SliderController::class,'save_edt_sec3v']); //Deena

Route::get('/admin/sec3_chnge_status/{id}',[SliderController::class,'sec3_chnge_status']);//Deena



Route::get('admin/show_alumni',[SliderController::class,'show_alumni']);

Route::post('admin/insert_alumni',[SliderController::class,'insert_alumni']);

Route::get('admin/del_alumni/{id}',[SliderController::class,'del_alumni']);

Route::get('admin/edt_alumniv/{id}',[SliderController::class,'edt_alumniv']);

Route::post('admin/edt_alumni',[SliderController::class,'edt_alumni']);

Route::get('admin/status_update/{id}',[SliderController::class,'status_update']);





// Route::get('/admin/add_team',[SliderController::class,'add_team']);

Route::post('/admin/insert_team',[SliderController::class,'insert_team']);

Route::get('/admin/show_team',[SliderController::class,'show_team']);

Route::get('/admin/edt_teamv/{id}',[SliderController::class,'edt_teamv']);

Route::post('/admin/edt_team',[SliderController::class,'edt_team']);

Route::get('/admin/del_team/{id}',[SliderController::class,'del_team']);





Route::get('/admin/show_recupartners',[SliderController::class,'show_recupartners']);

Route::post('/admin/insert_recupartners',[SliderController::class,'insert_recupartners']);

Route::get('/admin/del_recupartners/{id}',[SliderController::class,'del_recupartners']);

Route::get('admin/edt_recupartnersv/{id}',[SliderController::class,'edt_recupartnersv']);

Route::post('admin/edt_recupartners',[SliderController::class,'edt_recupartners']);

Route::get('/admin/restatus_update/{id}',[SliderController::class,'restatus_update']);

//Event Page Route



Route::post('/admin/insert_event',[EventController::class,'insert_event']);

Route::get('/admin/show_events',[EventController::class,'show_events']);

Route::get('/admin/del_events/{id}',[EventController::class,'del_events']);

Route::get('/admin/edt_eventv/{id}',[EventController::class,'edt_eventv']);

Route::post('/admin/edt_event',[EventController::class,'edt_event']);



Route::post('admin/insert_speakers',[EventController::class,'insert_speakers']);

Route::get('admin/show_speakers/',[EventController::class,'show_speakers']);

Route::get('admin/del_speakers/{id}',[EventController::class,'del_speakers']);

Route::get('admin/edit_speakersv/{id}',[EventController::class,'edit_speakersv']);

Route::post('admin/edit_speakers',[EventController::class,'edit_speakers']);



Route::get('admin/evnt_registerd/{event_id}',[EventController::class,'evnt_registerd']);

Route::get('admin/event_speakers/{event_id}',[EventController::class,'event_speakers']);  //Code by Deena Nath

Route::get('admin/event_change_status/{event_id}',[EventController::class,'event_change_status']);  //Code by Deena Nath



//Course Page Route



Route::get('/admin/add_course',[CourseController::class,'add_course']);

Route::get('/admin/show_course',[CourseController::class,'show_course']);

Route::post('/admin/insert_course',[CourseController::class,'insert_course']);

Route::get('/admin/course_delete/{id}',[CourseController::class,'course_delete']);

Route::get('/admin/course_edit_view/{id}',[CourseController::class,'course_edit_view']);

Route::post('/admin/course_edit',[CourseController::class,'course_edit']);

Route::get('/admin/course_details/{id}',[CourseController::class,'course_details']);

Route::get('/admin/course_change_status/{id}',[CourseController::class,'course_change_status']);

Route::get('/admin/course_schedule_status/{key}/{id}',[CourseController::class,'course_schedule_status']);

Route::get('/admin/sheets_number_status/{id}',[CourseController::class,'sheets_number_status']);

Route::get('admin/removeModule/{id}',[CourseController::class,'removeModule']);  //Code by Deena Nath



Route::get('/admin/show_crstestmonial/{tbl_course_id}',[CourseController::class,'show_crstestmonial']);

Route::post('/admin/insert_curtestimonial',[CourseController::class,'insert_curtestimonial']);

Route::get('/admin/del_crstestmonial/{id}',[CourseController::class,'del_crstestmonial']);

Route::get('/admin/edt_crstestmonialv/{id}',[CourseController::class,'edt_crstestmonialv']);

Route::post('/admin/edt_crstestmonial',[CourseController::class,'edt_crstestmonial']);

Route::get('/admin/crstestmonial_chng_stus/{id}',[CourseController::class,'crstestmonial_chng_stus']);



Route::get('/admin/show_crsalumni/{tbl_course_id}',[CourseController::class,'show_crsalumni']);

Route::post('/admin/insert_crsalumni',[CourseController::class,'insert_crsalumni']);

Route::get('/admin/del_crsalumni/{id}',[CourseController::class,'del_crsalumni']);

Route::get('/admin/edt_crsalumniv/{id}',[CourseController::class,'edt_crsalumniv']);

Route::post('/admin/edt_crsalumni',[CourseController::class,'edt_crsalumni']);

Route::get('/admin/crsalumni_chng_stus/{id}',[CourseController::class,'crsalumni_chng_stus']);



Route::get('/admin/show_instructure',[CourseController::class,'show_instructure']);

Route::post('/admin/insert_instructure',[CourseController::class,'insert_instructure']);

Route::get('/admin/del_instructure/{id}',[CourseController::class,'del_instructure']);

Route::get('/admin/edt_instructurev/{id}',[CourseController::class,'edt_instructurev']);

Route::post('/admin/edt_instructure',[CourseController::class,'edt_instructure']);



Route::get('/admin/show_installment_charges',[CourseController::class,'show_installment_charges']); //Deena

Route::post('/admin/edit_installment_charges',[CourseController::class,'edit_installment_charges']); //Deena


Route::get('/admin/refer_friend',[AdminController::class,'edit_refer_friend']);
Route::post('/admin/edt_refer_friend',[AdminController::class,'edt_refer_friend']);


Route::get('/admin/show_faq/{id}',[CourseController::class,'show_faq']);

Route::post('/admin/insert_faq',[CourseController::class,'insert_faq']);

Route::get('/admin/del_faq/{id}',[CourseController::class,'del_faq']);

Route::get('/admin/edt_faqv/{id}',[CourseController::class,'edt_faqv']);

Route::post('/admin/edt_faq',[CourseController::class,'edt_faq']);

Route::get('/admin/faq_stus_change/{id}',[CourseController::class,'faq_stus_change']);









Route::get('/admin/show_careermap',[CourseController::class,'show_careermap']);

Route::get('/admin/edt_careermapsv/{id}',[CourseController::class,'careermapsv']);

Route::post('/admin/edt_careermapsv/',[CourseController::class,'edt_careermapsv']);

Route::get('/admin/cmap_stus_change/{id}',[CourseController::class,'cmap_stus_change']);



// Route::get('admin/add_coupon',[CourseController::class,'add_coupon']);



Route::get('/admin/testimonials',[TestimonialController::class,'testimonials']);

Route::get('/admin/addtestimonials',[TestimonialController::class,'addtestimonials']);

Route::post('/admin/insert_testimonial',[TestimonialController::class,'insert_testimonial']);

Route::get('/admin/delete_testimonial/{id}',[TestimonialController::class,'delete_testimonial']);

Route::get('/admin/testimonial_edit_view/{id}',[TestimonialController::class,'testimonial_edit_view']);

Route::post('/admin/testimonial_edit',[TestimonialController::class,'testimonial_edit']);

Route::get('/admin/testimonials_add_video',[TestimonialController::class,'testimonials_add_video']);

Route::get('/admin/tvdo_change_status/{id}',[TestimonialController::class,'tvdo_change_status']); // Deena

Route::post('/admin/insert_testimonial_video',[TestimonialController::class,'insert_testimonial_video']);

Route::get('/admin/testimonials_show_video',[TestimonialController::class,'testimonials_show_video']);

Route::get('/admin/testimonials_del_video/{id}',[TestimonialController::class,'testimonials_del_video']);

Route::get('/admin/tstimonials_editvdo_view/{id}',[TestimonialController::class,'tstimonials_editvdo_view']);

Route::post('/admin/tstimonials_editvdo',[TestimonialController::class,'tstimonials_editvdo']);



Route::get('/admin/add_lecture',[TestimonialController::class,'add_lecture']);





Route::get('admin/show_coupon',[CourseController::class,'show_coupon']);

Route::post('admin/insert_coupon',[CourseController::class,'insert_coupon']);

Route::get('admin/edit_coupon/{id}',[CourseController::class,'edit_coupon']);

Route::get('/admin/coupon_change_status/{id}',[CourseController::class,'coupon_change_status']);

Route::get('/admin/coupon_delete/{id}',[CourseController::class,'coupon_delete']);

Route::get('/admin/coupon_details/{id}',[CourseController::class,'coupon_details']);

Route::get('/admin/inst_change_status/{id}',[CourseController::class,'inst_change_status']); // Deena



Route::get('/admin/send_mass_emails',[AdminController::class,'send_mass_emails']); //Deena 

Route::post('/admin/insert_send_mass_emails',[AdminController::class,'insert_send_mass_emails']); //Deena 

Route::post('/admin/sentCourseId',[AdminController::class,'sentCourseId']); //Deena 

Route::post('/admin/sentEventId',[AdminController::class,'sentEventId']); //Deena 



// Metrics Counter

Route::get('/admin/show_metrics_counter',[AdminController::class,'show_metrics_counter']);

Route::get('/admin/edt_metrics_counter/{id}',[AdminController::class,'edt_metrics_counter']);

Route::post('/admin/insert_metrics_counter',[AdminController::class,'insert_metrics_counter']);



});

