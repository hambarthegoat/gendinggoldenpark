<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:150'],
            'house_type' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        Lead::create($validated);

        return redirect()
            ->route('home')
            ->withFragment('kontak')
            ->with('lead_success', 'Terima kasih! Tim kami akan segera menghubungi Anda.');
    }
}
