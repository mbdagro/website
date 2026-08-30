<?php

use App\Http\Controllers\AppsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\JourneyTimelineController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes(['register' => false]);
// Route::get('/', function () {
// return view('home');
// });
Route::get('/', 'AppsController@home')->name('fronted.home');

Route::get('all_apartments', 'AppsController@all_apartments')->name('all.apartments');
Route::get('ongoing_apartments', 'AppsController@ongoing_apartments')->name('ongoing.apartments');
Route::get('completed_apartments', 'AppsController@completed_apartments')->name('completed.apartments');
Route::get('upcomeing_apartments', 'AppsController@upcomeing_apartments')->name('upcomeing.apartments');
Route::get('consultancy_apartment', 'AppsController@consultancy_apartment')->name('consultancy.apartments');

Route::get('ongoing_duplex', 'AppsController@ongoing_duplex')->name('ongoing.duplex');
Route::get('completed_duplex', 'AppsController@completed_duplex')->name('completed.duplex');
Route::get('apartments_details/{id}', 'AppsController@apartments_details')->name('apartments.details');


Route::get('completed_lands', 'AppsController@completed_lands')->name('completed.lands');
Route::get('completed_hotels', 'AppsController@completedHotels')->name('completed.hotels');
Route::get('lands_details', 'AppsController@lands_details')->name('lands.details');
Route::get('our_team', 'AppsController@our_team')->name('our.team');
Route::get('archives', 'AppsController@archives')->name('archives');
Route::get('about_us', 'AppsController@about_us')->name('about.us');
Route::get('up_coming', 'AppsController@up_coming')->name('up_coming');
Route::get('documents/{id}/download', [DocumentController::class, 'download'])->name('document.public.download');
// Route::get('project', 'AppsController@about_us')->name('project');
Route::get('project', [AppsController::class, 'Project'])->name('project');
Route::get('offer', [AppsController::class, 'offer'])->name('offer');
// Project detail page  →  /project/{id}
Route::get('/project/{id}', [AppsController::class, 'show'])->name('project.show');
Route::get('concern', 'AppsController@Concern')->name('concern');
Route::get('news-events', 'AppsController@news_event')->name('news-events');
Route::get('printing-publication', 'AppsController@printing_publication')->name('printing-publication');

Route::get('concern_details/{id}', 'AppsController@ConcernDetail')->name('concern.details');
Route::get('sister_project/{id}', 'AppsController@SisterProjectDetail')->name('sister_project.details');
Route::get('contact_us', 'AppsController@contact_us')->name('contact.us');
Route::post('contact_us-data-insert', 'AppsController@contactUsDataInsert')->name('contact_us-data-insert');
Route::get('europa_homes', 'AppsController@EuropaHomesDetail')->name('europa_homes.details');
Route::get('europa_housing/{id}', 'AppsController@EuropaHousingDetail')->name('europa_housing.details');
Route::get('europa_elevator/{id}', 'AppsController@EuropaElevatorDetail')->name('europa_elevator.details');
Route::get('europa_developers/{id}', 'AppsController@EuropaDevelopersDetail')->name('europa_developers.details');

Route::get('sales-open', 'AppsController@sales_open')->name('sales-open');
Route::post('booking-data-insert', 'AppsController@bookingDataInsert')->name('booking-data-insert');
Route::get('booking-info.view', 'AppsController@bookingData')->name('booking-info.view');
Route::get('booking-data.view', 'AppsController@bookingDataView')->name('booking-data.view');

Route::get('book-now', 'AppsController@bookNow')->name('book-now');
Route::get('rewards', 'AppsController@rewards')->name('rewards');
Route::get('client-review', 'AppsController@ClientReview')->name('client-review');

Route::get('gallery', 'AppsController@gallery')->name('gallery.view');
Route::get('blogs', 'AppsController@blogs')->name('blogs.view');
Route::get('blogs/{slug}', 'AppsController@blogsShow')->name('blog.show');
Route::get('pricing', 'AppsController@pricing')->name('pricing');

Route::get('notice', 'NoticeBoardController@Notice')->name('notice');
Route::get('carrer', 'AppsController@carrer')->name('carrer');

Route::group(['middleware' => ['auth']], function () {

    Route::get('admin/profile', 'UserController@profile')->name('profile');
    Route::post('admin/profile/update', 'UserController@profileUpdate')->name('profile.update');

    Route::get('admin/user_mana gement/{id?}', 'UserController@user_management')->name('user_management');
    Route::post('admin/user_management/update', 'UserController@user_management_update')->name('user_management.update');

    Route::get('admin/home_management', 'HomeManagementController@HomeManagement')->name('home_management.view');
    Route::post('admin/home_management_update', 'HomeManagementController@HomeManagementUpdate')->name('home_management.update');
    Route::get('admin/gallary', 'GallaryController@Gallary')->name('gallary.view');
    Route::post('admin/gallary_update', 'GallaryController@GallaryInsertUpdate')->name('gallary.update');
    Route::get('admin/gallary_edit', 'GallaryController@GallaryEditData')->name('gallary.edit');
    Route::get('admin/gallary_data', 'GallaryController@GallaryData')->name('gallary.data');

    Route::get('admin/productservice', 'ProductServiceController@ProductService')->name('productservice.view');
    Route::post('admin/productservice_update', 'ProductServiceController@ProductServiceInsertUpdate')->name('productservice.update');
    Route::get('admin/productservice_edit', 'ProductServiceController@ProductServiceEditData')->name('productservice.edit');
    Route::get('admin/productservice_data', 'ProductServiceController@ProductServiceData')->name('productservice.data');

    Route::get('admin/reward', 'ProductServiceController@Reward')->name('reward.view');
    Route::post('admin/reward_update', 'ProductServiceController@RewardUpdate')->name('reward.update');
    Route::get('admin/reward_edit', 'ProductServiceController@RewardEdit')->name('reward.edit');
    Route::get('admin/reward_data', 'ProductServiceController@RewardData')->name('reward.data');

    Route::get('admin/our_team', 'OurTeamController@OurTeam')->name('our_team.view');
    Route::post('admin/our_team_update', 'OurTeamController@OurTeamInsertUpdate')->name('our_team.update');
    Route::get('admin/our_team_edit', 'OurTeamController@OurTeamEditData')->name('our_team.edit');
    Route::get('admin/our_team_data', 'OurTeamController@OurTeamData')->name('our_team.data');

    Route::get('admin/our_director', 'OurTeamController@OurDirector')->name('our_director.view');
    Route::post('admin/our_director_update', 'OurTeamController@OurDirectorInsertUpdate')->name('our_director.update');
    Route::get('admin/our_director_edit', 'OurTeamController@OurDirectorEditData')->name('our_director.edit');
    Route::get('admin/our_director_data', 'OurTeamController@OurDirectorData')->name('our_director.data');

    Route::get('admin/authority_speech', 'OurTeamController@AuthoritySpeech')->name('authority_speech.view');
    Route::post('admin/authority_speech_update', 'OurTeamController@AuthoritySpeechInsertUpdate')->name('authority_speech.update');
    Route::get('admin/authority_speech_edit', 'OurTeamController@AuthoritySpeechEditData')->name('authority_speech.edit');
    Route::get('admin/authority_speech_data', 'OurTeamController@AuthoritySpeechData')->name('authority_speech.data');

    Route::get('admin/category', 'CategoryController@Category')->name('category.view');
    Route::post('admin/category_update', 'CategoryController@CategoryInsertUpdate')->name('category.update');
    Route::get('admin/category_edit', 'CategoryController@CategoryEditData')->name('category.edit');
    Route::get('admin/category_data', 'CategoryController@CategoryData')->name('category.data');

    Route::get('admin/sub_category', 'SubCategoryController@SubCategory')->name('sub_category.view');
    Route::post('admin/sub_category_update', 'SubCategoryController@SubCategoryInsertUpdate')->name('sub_category.update');
    Route::get('admin/sub_category_edit', 'SubCategoryController@SubCategoryEditData')->name('sub_category.edit');
    Route::get('admin/sub_category_data', 'SubCategoryController@SubCategoryData')->name('sub_category.data');


    Route::get('admin/news_event', 'NewsEventController@NewsEvent')->name('news_event.view');
    Route::post('admin/news_event_update', 'NewsEventController@NewsEventInsertUpdate')->name('news_event.update');
    Route::get('admin/news_event_edit', 'NewsEventController@NewsEventEditData')->name('news_event.edit');
    Route::get('admin/news_event_data', 'NewsEventController@NewsEventData')->name('news_event.data');

    Route::get('admin/notice_board', 'NoticeBoardController@NoticeBoard')->name('notice_board.view');
    Route::post('admin/notice_board_update', 'NoticeBoardController@NoticeBoardInsertUpdate')->name('notice_board.update');
    Route::get('admin/notice_board_edit', 'NoticeBoardController@NoticeBoardEditData')->name('notice_board.edit');
    Route::get('admin/notice_board_data', 'NoticeBoardController@NoticeBoardData')->name('notice_board.data');

    Route::get('admin/what_makes_us_best', 'NoticeBoardController@WhatMakesUsBest')->name('what_makes_us_best.view');
    Route::get('admin/what_makes_us_best_data', 'NoticeBoardController@WhatMakesUsBestData')->name('what_makes_us_best.data');
    Route::post('admin/what_makes_us_best_update', 'NoticeBoardController@WhatMakesUsBestInsertUpdate')->name('what_makes_us_best.update');
    Route::get('admin/what_makes_us_best_edit', 'NoticeBoardController@WhatMakesUsBestEditData')->name('what_makes_us_best.edit');

    Route::get('admin/video_link', 'NoticeBoardController@VideoLink')->name('video-link.view');
    Route::get('admin/video_link_data', 'NoticeBoardController@VideoLinkData')->name('video_link.data');
    Route::post('admin/video_link_update', 'NoticeBoardController@VideoLinkInsertUpdate')->name('video_link.update');
    Route::get('admin/video_link_edit', 'NoticeBoardController@VideoLinkEditData')->name('video_link.edit');

    Route::get('admin/pricing', 'NoticeBoardController@Pricing')->name('pricing.view');
    Route::get('admin/pricing_data', 'NoticeBoardController@PricingData')->name('pricing.data');
    Route::post('admin/pricing_update', 'NoticeBoardController@PricingInsertUpdate')->name('pricing.update');
    Route::get('admin/pricing_edit', 'NoticeBoardController@PricingEditData')->name('pricing.edit');

    Route::get('admin/client_review', 'NoticeBoardController@ClientReview')->name('client_review.view');
    Route::get('admin/client_review_data', 'NoticeBoardController@ClientReviewData')->name('client_review.data');
    Route::post('admin/client_review_update', 'NoticeBoardController@ClientReviewInsertUpdate')->name('client_review.update');
    Route::get('admin/client_review_edit', 'NoticeBoardController@ClientReviewEditData')->name('client_review.edit');

    Route::get('admin/carrer', 'NoticeBoardController@Carrer')->name('carrer.view');
    Route::get('admin/carrer_data', 'NoticeBoardController@CarrerData')->name('carrer.data');
    Route::post('admin/carrer_update', 'NoticeBoardController@CarrerInsertUpdate')->name('carrer.update');
    Route::get('admin/carrer_edit', 'NoticeBoardController@CarrerEditData')->name('carrer.edit');

    // Concern
    Route::get('admin/concern', 'ConcernController@Concern')->name('concern.view');
    Route::post('admin/concern_update', 'ConcernController@ConcernInsertUpdate')->name('concern.update');
    Route::get('admin/concern_edit', 'ConcernController@ConcernEditData')->name('concern.edit');
    Route::get('admin/concern_data', 'ConcernController@ConcernData')->name('concern.data');

    // SisterProject
    Route::get('admin/sister_project', 'ConcernController@SisterProject')->name('sister_project.view');
    Route::post('admin/sister_project_update', 'ConcernController@SisterProjectInsertUpdate')->name('sister_project.update');
    Route::get('admin/sister_project_edit', 'ConcernController@SisterProjectEditData')->name('sister_project.edit');
    Route::get('admin/sister_project_data', 'ConcernController@SisterProjectData')->name('sister_project.data');

    Route::get('admin/contact_us_list', 'ContactUSController@ContactUsList')->name('contact_us.view');
    Route::get('admin/contact_us_data', 'ContactUSController@ContactUSData')->name('contact_us.data');

    Route::get('admin/post_management', 'BackEndController@post_management')->name('index');
    Route::post('admin/order/delete', 'OrderController@OrderDelete')->name('order.delete');

    Route::get('admin/user_list', 'UserController@UserListData')->name('user.user_list.data');
    Route::get('admin', 'BackEndController@index')->name('admin.dashboard');
    Route::get('admin/quote_add', 'BackEndController@quote_add');
    Route::get('admin/print_order_add/{id?}', 'OrderController@print_order_add')->name('admin.order.new');
    Route::get('admin/quote_list', 'BackEndController@quote_list')->name('quote_list');
    Route::post('admin/order/post', 'OrderController@NewOrder')->name('order.post');
    Route::get('admin/print_order_list', 'OrderController@PrintOrderListView')->name('admin.order.list');
    Route::get('admin/print_order_download', 'OrderController@orderAttachmentDownload')->name('admin.order.download');
    Route::get('admin/print_order_attachment_delete', 'OrderController@orderAttachmentDelete')->name('admin.order.attachment.delete');
    Route::get('admin/order_data', 'OrderController@OrderData')->name('admin.order.data');
    /*End BackEnd UI*/
    // });
    Route::get('admin/user_list', 'UserController@UserListData')->name('user.user_list.data');
    Route::get('admin/client_list/{id?}', 'UserController@client_list')->name('client_list');
    Route::get('admin/only_user_list', 'UserController@UserListDataOnlyUser')->name('user.only_user_list.data');
    Route::get('filemanager', 'BackEndController@getFileManager')->name('filemanager.index');


    // FAQ
    Route::get('admin/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('faq-data', [FaqController::class, 'getData'])->name('faq.data');
    Route::post('faq-insert', [FaqController::class, 'insert'])->name('faq.insert');
    Route::get('faq-edit', [FaqController::class, 'edit'])->name('faq.edit');

    // Journey Timeline Controller
    Route::get('journey', [JourneyTimelineController::class, 'index'])->name('journey.view');
    Route::get('journey-data', [JourneyTimelineController::class, 'getData'])->name('journey.data');
    Route::post('journey-insert', [JourneyTimelineController::class, 'insert'])->name('journey.insert');
    Route::get('journey-edit', [JourneyTimelineController::class, 'edit'])->name('journey.edit');
    // blogs
    // ✅ FIXED — all routes must have admin/ prefix
    Route::get('admin/blogs',        [BlogController::class, 'index'])->name('blog.index');
    Route::get('admin/blogs/data',   [BlogController::class, 'getData'])->name('blog.data');   // ✅
    Route::post('admin/blogs/insert', [BlogController::class, 'insert'])->name('blog.insert');  // ✅
    Route::get('admin/blogs/edit',   [BlogController::class, 'edit'])->name('blog.edit');
    // DocumentController
    Route::get('admin/documents',         [DocumentController::class, 'index'])->name('document.index');
    Route::get('admin/documents/data',    [DocumentController::class, 'getData'])->name('document.data');
    Route::post('admin/documents/insert', [DocumentController::class, 'insert'])->name('document.insert');
    Route::get('admin/documents/edit',    [DocumentController::class, 'edit'])->name('document.edit');
    Route::get('admin/documents/{id}/download', [DocumentController::class, 'download'])->name('document.download');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
