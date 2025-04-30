<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            }
            if ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $vehicles = $query->paginate(10);

        return view('public.index', compact('vehicles'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
