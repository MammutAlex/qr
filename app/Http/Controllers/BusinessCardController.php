<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BusinessCardController extends Controller
{

    public function store(Request $request)
    {
        $model = BusinessCard::forceCreate([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'linkedin' => $request->input('linkedin'),
            'facebook' => $request->input('facebook'),
            'telegram' => $request->input('telegram'),
        ]);
        return to_route('qr.show', $model);
    }

    public function show(BusinessCard $qr)
    {
        return Inertia::render('BusinessCard', [
            'card' => $qr,
        ]);
    }
}
