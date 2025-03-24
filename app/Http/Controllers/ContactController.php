<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function delete(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->back();
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all();
        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(SendContactRequest $request)
    {
        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description')
        ]);

        return redirect('admin/all-contacts');
    }
}
