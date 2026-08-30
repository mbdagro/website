<?php

namespace App\Http\Controllers;

use App\Concern;
use App\Models\SisterProject;
use App\Carrer;
use App\ContactUS;
use App\WhatMakesUsBest;
use App\VideoLink;
use App\ClientReview;
use App\BookingInfo;
use App\Category;
use App\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ProductService;
use App\OurTeam;
use App\Models\OurDirector;
use App\Models\AuthoritySpeech;
use App\Gallary;
use App\Models\Blog;
use App\Models\Document;
use App\Models\Faq;
use App\Models\JourneyTimeline;
use App\Reward;
use Carbon\Carbon;
use App\NewsEvent;
use Yajra\Datatables\Datatables;
use Session;

class AppsController extends Controller
{
    public function alert()
    {
        return view('layouts.alert');
    }
    // public function ConcernDetail($id)
    // {
    //     $Concern = Concern::find($id);
    //     return view('concern_detail', compact('Concern'));
    // }

    public function ConcernDetail($id)
    {
        $Concern = Concern::find($id);
        $ProductServices = ProductService::where('category', 'Apartments')->get();
        // if(!$Concern){
        //     abort(404);
        // }

        // $SisterProjects = $Concern->sisterProjects;

        return view('concern_detail', compact('Concern', 'ProductServices'));
    }

    public function SisterProjectDetail($id)
    {
        $project = SisterProject::with('Concern')->find($id);
        if (!$project) {
            abort(404);
        }
        return view('sister_project_detail', compact('project'));
    }

    public function EuropaHomesDetail()
    {
        $ProductServices = ProductService::where('category', 'Apartments')->get();
        return view('europa_homes', compact('ProductServices'));
    }

    public function EuropaHousingDetail($id)
    {
        $projects = SisterProject::where('project_id', $id)->get();
        return view('europa_housing', compact('projects'));
    }

    public function EuropaElevatorDetail($id)
    {
        $projects = SisterProject::where('project_id', $id)->get();

        return view('europa_elevator', compact('projects'));
    }

    public function EuropaDevelopersDetail($id)
    {
        $projects = SisterProject::where('project_id', $id)->get();
        return view('europa_developers', compact('projects'));
    }

    public function Concern()
    {
        $Concerns = Concern::whereType('Our Concern')->get();
        return view('concern', compact('Concerns'));
    }

    public function printing_publication()
    {
        $Concerns = Concern::whereType('Printing')->get();
        return view('printing', compact('Concerns'));
    }

    public function news_event()
    {
        $events = NewsEvent::whereType('Events')->get();
        return view('news-event', compact('events'));
    }
    public function home()
    {
        $OurTeams = OurTeam::get();

        // return   $OurTeams ;
        $gallary = Gallary::where('type', 'slider')->get();
        $NewsEvent = NewsEvent::whereType('Breaking News')->get();
        // $ProductServices = ProductService::where('category', 'Apartments')->get();
        $ProductServices = ProductService::where('end_date', '>=', Carbon::now())->get();
        $Concerns = Concern::whereType('Our Concern')->orderBy('id', 'DESC')->get();
        $WhatMakesUsBest = WhatMakesUsBest::orderBy('id', 'DESC')->get();
        $VideoLink = VideoLink::orderBy('id', 'DESC')->latest()->take(4)->get();
        $DuplexProductServices = ProductService::where('category', 'Duplex')->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();
        $blogs = Blog::active()->orderBy('sort_order')->latest()->take(3)->get();
        $journeys = JourneyTimeline::where('is_active', '1')->orderBy('year', 'asc')->latest()->take(3)->get();
        return view('home', compact('faqs', 'ProductServices', 'gallary', 'NewsEvent', 'Concerns', 'WhatMakesUsBest', 'VideoLink', 'OurTeams', 'DuplexProductServices', 'blogs', 'journeys'));
    }
    public function all_apartments()
    {
        $ProductService = ProductService::where('category', 'Apartments')->get();
        return view('all_apartments', compact('ProductService'));
    }

    public function ongoing_apartments()
    {
        $ProductService = ProductService::where('category', 'Apartments')->get();
        return view('ongoing_apartments', compact('ProductService'));
    }
    public function completed_apartments()
    {
        $ProductService = ProductService::where('category', 'Apartments')->get();
        return view('completed_apartments', compact('ProductService'));
    }
    public function upcomeing_apartments()
    {
        $ProductService = ProductService::where('category', 'Apartments')->get();
        return view('upcomeing_apartments', compact('ProductService'));
    }
    public function consultancy_apartment()
    {
        $ProductService = ProductService::where('category', 'Apartments')->get();
        return view('consultancy_apartment', compact('ProductService'));
    }
    public function ongoing_duplex()
    {
        $ProductService = ProductService::where('category', 'Duplex')->get();
        return view('ongoing_duplex', compact('ProductService'));
    }
    public function completed_duplex()
    {
        $ProductService = ProductService::where('category', 'Duplex')->get();
        return view('completed_duplex', compact('ProductService'));
    }
    public function apartments_details($id)
    {
        $ProductService = ProductService::find($id);

        $Popular_ProductServices = ProductService::where('category', 'Apartments')
            ->where('available_from', '>=', Carbon::now()->subYear()) // Filter for dates within the last year
            ->orderBy('available_from', 'desc') // Order by launch date descending
            ->take(3) // Get the top 3 results
            ->get();


        $DuplexProductServices = ProductService::where('category', 'Duplex')->get();

        $galleries = Gallary::where('type', 'gallary')->get();

        // return  $Popular_ProductService;
        // $Reward = Reward::where('product_id',$id)->first();
        return view('apartments_details', compact('ProductService', 'Popular_ProductServices', 'galleries', 'DuplexProductServices'));
    }

    public function rewards()
    {
        $Reward = Reward::latest()->take(1)->first();
        return view('rewards', compact('Reward'));
    }

    public function ClientReview()
    {
        $ClientReview = ClientReview::latest()->take(1)->first();
        return view('client_review', compact('ClientReview'));
    }

    public function completed_lands()
    {
        $ProductService = ProductService::where('category', 'Lands')->get();
        return view('completed_lands', compact('ProductService'));
    }
    public function lands_details()
    {
        return view('lands_details');
    }

    public function our_team()
    {
        $ourTeam = OurTeam::get();
        return view('our_team', compact('ourTeam'));
    }


    public function archives()
    {
        return view('archives');
    }
    public function about_us()
    {
        $OurTeams = OurTeam::get();
        $OurDirectors = OurDirector::get();
        $AuthoritySpeechs = AuthoritySpeech::get();
        $Concerns = Concern::whereType('Our Concern')->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();
        $journeys = JourneyTimeline::where('is_active', '1')->orderBy('year', 'asc')->get();
        return view('about_us', compact('OurTeams', 'OurDirectors', 'AuthoritySpeechs', 'Concerns', 'faqs', 'journeys'));
    }
    public function contact_us()
    {
        return view('contact_us');
    }
    public function contactUsDataInsert(Request $request)
    {

        $request->validate(array(
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'mobile' => 'required|size:11',
        ));
        $message = 'Create Successfully!';

        $query = new ContactUS;

        $query->full_name  = $request->name;
        $query->phone  = $request->mobile;
        $query->email  = $request->email;
        $query->subject  = $request->subject;
        $query->message  = $request->message;
        $query->save();

        // return response()->json([
        //     'status' => "success",
        //     'message' => $message
        // ]);
        Session::put('success', "Message Send Successfully!.");
        return redirect()->route('contact.us');
    }
    public function sales_open()
    {
        $product_service = ProductService::orderBy('id', 'desc')->get();
        return view('sales_open', compact('product_service'));
    }
    public function bookingDataInsert(Request $request)
    {
        if ($request->has('delete')) {
            $query = BookingInfo::find($request->delete);
            $query->delete();
            $message = ' Deleted Successfully!';
        } else {
            $request->validate(array(
                'product_service_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required|size:11',
            ));
            $message = 'Create Successfully!';

            if ($request->has('id')) {
                $query = BookingInfo::find($request->id);
                $message = 'Updated Successfully!';

                if (!$query) {
                    return response()->json([
                        'status' => "error",
                        'message' => "Not Found, Please Try Again..."
                    ], 422);
                }
            } else {
                $query = new BookingInfo;
            }

            $query->product_service_id  = $request->product_service_id;
            $query->name  = $request->name;
            $query->email  = $request->email;
            $query->mobile  = $request->mobile;
            $query->message  = $request->message;
            $query->save();
        }
        // return response()->json([
        //     'status' => "success",
        //     'message' => $message
        // ]);
        Session::put('success', "Booking Confirm Successfully!.");
        return redirect()->route('sales-open');
    }
    public function bookingDataView()
    {
        $Query = BookingInfo::orderBy('id', 'desc')->select('id', 'product_service_id', 'name', 'email', 'mobile', 'message')->get();
        $this->i = 1;
        // dd($Query);
        return DataTables::of($Query)
            ->addColumn('product_service_id', function ($data) {
                return $data->ProductService ? $data->ProductService->name : '';
            })
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('action', function ($data) {
                $htmlData = '';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-info btn-sm tableEdit"><i class="fa fa-edit"></i></a>';
                $htmlData .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="btn btn-danger btn-sm tableDelete"><i class="fa fa-trash"></i></a>';
                return $htmlData;
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    public function bookingData()
    {
        return view('admin.bookingData');
    }
    public function bookNow(Request $request)
    {
        $product_service_id = $request->product_service_id;
        $product_service = ProductService::orderBy('id', 'desc')->get();
        return view('bookNow', compact('product_service', 'product_service_id'));
    }
    public function gallery()
    {
        $gallery = Gallary::where('type', 'gallary')->get();
        $VideoLink = VideoLink::get();
        return view('gallery', compact('gallery', 'VideoLink'));
    }
    public function pricing()
    {
        $pricing = Pricing::latest()->take(1)->first();
        return view('pricing', compact('pricing'));
    }
    public function carrer()
    {
        $carrer = Carrer::orderBy('id', 'DESC')->get();
        return view('carrer', compact('carrer'));
    }

    public function completedHotels()
    {
        $ProductService = ProductService::where('category', 'Hotels')->get();
        // @dd($ProductService);
        return view('completed_hotels', compact('ProductService'));
    }

    public function Project(Request $request)
    {
        $query = ProductService::query()->where('type', 'project');

        // ── Category filter ──────────────────────────────────────────────────
        $categories = $request->input('category', []);
        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        // ── Keyword search ───────────────────────────────────────────────────
        if ($keyword = $request->input('keyword')) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // ── Price range filter ───────────────────────────────────────────────
        if ($minPrice = $request->input('min_price')) {
            $query->where('per_share', '>=', (float) str_replace(',', '', $minPrice));
        }
        if ($maxPrice = $request->input('max_price')) {
            $query->where('per_share', '<=', (float) str_replace(',', '', $maxPrice));
        }

        // ── Return type filter ────────────────────────────────────────────────
        $returnTypes = $request->input('return_type', []);
        if (!empty($returnTypes)) {
            $query->whereIn('return_type', $returnTypes);   // adjust column name
        }

        // ── Paginate ─────────────────────────────────────────────────────────
        $ProductServiuces = $query->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends($request->query());

        $Category = Category::get();

        // ── AJAX request → return only the cards HTML + load-more state ────────
        if ($request->ajax() || $request->input('ajax')) {
            $html = view(
                'Project.project_cards',
                compact('ProductServiuces')
            )->render();

            return response()->json([
                'html' => $html,
                'has_more' => $ProductServiuces->hasMorePages(),
                'next_page' => $ProductServiuces->currentPage() + 1,
            ]);
        }

        // ── Normal full-page request ──────────────────────────────────────────
        return view('Project.project', compact('ProductServiuces', 'Category'));
    }

    /**
     * Project detail page
     */
    public function show($id)
    {
        // Fetch the project (404 if not found)
        $project = ProductService::with('category')->findOrFail($id);

        // Related projects: same category, excluding current, max 3
        $relatedProjects = ProductService::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->limit(3)
            ->get();

        return view('Project.detail', compact('project', 'relatedProjects'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::active()->orderBy('sort_order')->latest()->get();
        return view('blogs', compact('blogs'));
    }
    public function blogsShow($slug)
    {
        $blog        = Blog::active()->where('slug', $slug)->firstOrFail();
        $latestBlogs = Blog::active()->where('id', '!=', $blog->id)->latest()->take(6)->get();
        return view('blog-show', compact('blog', 'latestBlogs'));
    }
    public function up_coming(Request $request)
    {
        $query = ProductService::query()->where('type', 'project')->where('progress', 'upcoming');

        // ── Category filter ──────────────────────────────────────────────────
        $categories = $request->input('category', []);
        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        // ── Keyword search ───────────────────────────────────────────────────
        if ($keyword = $request->input('keyword')) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // ── Price range filter ───────────────────────────────────────────────
        if ($minPrice = $request->input('min_price')) {
            $query->where('per_share', '>=', (float) str_replace(',', '', $minPrice));
        }
        if ($maxPrice = $request->input('max_price')) {
            $query->where('per_share', '<=', (float) str_replace(',', '', $maxPrice));
        }

        // ── Return type filter ────────────────────────────────────────────────
        $returnTypes = $request->input('return_type', []);
        if (!empty($returnTypes)) {
            $query->whereIn('return_type', $returnTypes);   // adjust column name
        }

        // ── Paginate ─────────────────────────────────────────────────────────
        $ProductServiuces = $query->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends($request->query());

        $Category = Category::get();

        // ── AJAX request → return only the cards HTML + load-more state ────────
        if ($request->ajax() || $request->input('ajax')) {
            $html = view(
                'Project.project_cards',
                compact('ProductServiuces')
            )->render();

            return response()->json([
                'html' => $html,
                'has_more' => $ProductServiuces->hasMorePages(),
                'next_page' => $ProductServiuces->currentPage() + 1,
            ]);
        }
        $documents = Document::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();
        // $blog        = Blog::active()->where('slug', $slug)->firstOrFail();
        // $latestBlogs = Blog::active()->where('id', '!=', $blog->id)->latest()->take(6)->get();
        return view('up_coming', compact('ProductServiuces', 'Category', 'documents'));
    }
    public function offer(Request $request)
    {
        // $blog        = Blog::active()->where('slug', $slug)->firstOrFail();
        // $latestBlogs = Blog::active()->where('id', '!=', $blog->id)->latest()->take(6)->get();
        $query = ProductService::query()->where('type', 'offer');

        // ── Category filter ──────────────────────────────────────────────────
        $categories = $request->input('category', []);
        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        // ── Keyword search ───────────────────────────────────────────────────
        if ($keyword = $request->input('keyword')) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // ── Price range filter ───────────────────────────────────────────────
        if ($minPrice = $request->input('min_price')) {
            $query->where('per_share', '>=', (float) str_replace(',', '', $minPrice));
        }
        if ($maxPrice = $request->input('max_price')) {
            $query->where('per_share', '<=', (float) str_replace(',', '', $maxPrice));
        }

        // ── Return type filter ────────────────────────────────────────────────
        $returnTypes = $request->input('return_type', []);
        if (!empty($returnTypes)) {
            $query->whereIn('return_type', $returnTypes);   // adjust column name
        }

        // ── Paginate ─────────────────────────────────────────────────────────
        $ProductServiuces = $query->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends($request->query());

        $Category = Category::get();

        // ── AJAX request → return only the partial HTML ───────────────────────
        if ($request->ajax() || $request->input('ajax')) {
            $html = view(
                'Project.project_list',
                compact('ProductServiuces')
            )->render();

            return response()->json(['html' => $html]);
        }
        return view('offer', compact('ProductServiuces', 'Category'));
    }
}
