<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

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
        $this->contactRepo->createNew($request);
        return redirect('admin/all-contacts');
    }
}
