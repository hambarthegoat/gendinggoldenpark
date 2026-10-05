<?php

namespace App\Http\Controllers;

use App\Models\AccessPoint;
use App\Models\Advantage;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\GalleryItem;
use App\Models\HouseType;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\Testimonial;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::current();
        $stats = Stat::orderBy('sort_order')->get();
        $advantages = Advantage::orderBy('sort_order')->get();
        $houseTypes = HouseType::orderBy('sort_order')->get();
        $facilities = Facility::orderBy('sort_order')->get();
        $galleryItems = GalleryItem::orderBy('sort_order')->get();
        $accessPoints = AccessPoint::orderBy('sort_order')->get();
        $testimonials = Testimonial::orderBy('sort_order')->get();
        $faqs = Faq::orderBy('sort_order')->get();

        return view('landing.index', compact(
            'settings',
            'houseTypes',
            'facilities',
            'advantages',
            'testimonials',
            'faqs',
            'stats',
            'galleryItems',
            'accessPoints',
        ));
    }
}
