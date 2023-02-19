<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $contact = Contact::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $contact
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'title' => 'required',
        ]);
        $contact = Contact::create($request->all());
        return [
            "status" => 1,
            "data" => $contact
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function show(Contact $contact)
    {
        return [
            "status" => 1,
            "data" => $contact
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'title' => 'required',
        ]);

        $contact->update($request->all());
        return [
            "status" => 1,
            "data" => $contact,
            "msg" => "Contact updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return [
            "status" => 1,
            "data" => $contact,
            "msg" => "Contact deleted successfully"
        ];
    }
}
