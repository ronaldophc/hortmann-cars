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

    public function stock(Request $request)
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
            if ($request->sort == 'newest') {
                $query->orderBy('created_at', 'desc');
            }
            if ($request->sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        }

        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('manufacturer', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%");
            });
        }

        $vehicles = $query->paginate(5);

        return view('public.stock', compact('vehicles'));
    }

    public function showVehicle(Vehicle $vehicle)
    {
        return view('public.vehicle', compact('vehicle'));
    }
}
