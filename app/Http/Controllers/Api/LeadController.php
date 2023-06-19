<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required'],
            'address' => ['required', 'email'],
            'body' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 404);
        }
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('alessandro2ap3@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
        ]);
    }

}