<?php

namespace App\Http\Controllers;

use App\Models\TrumpName;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrumpNameController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome', [
            'names' => TrumpName::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:trump_names,name',
            'author' => 'nullable|string|max:255',
        ]);

        TrumpName::create([
            'name' => $validated['name'],
            'author' => $validated['author'] ?: 'Visitor',
        ]);

        return back();
    }
}
