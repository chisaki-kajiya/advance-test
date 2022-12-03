<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use PHPUnit\Framework\Test;

class ContactController extends Controller
{
    public function index()
    {
        $contact = [
            'last_name' => '',
            'first_name' => '',
            'gender' => '',
            'email' => '',
            'postcode' => '',
            'address' => '',
            'building_name' => '',
            'opinion' => '',
        ];
        return view('index', $contact);
    }

    public function confirm(ContactRequest $request)
    {
        $contact = [
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        return view('confirm', $contact);
    }

    public function back(Request $request)
    {
        $contact = [
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        return view('index', $contact);
    }

    public function create(Request $request)
    {
        if ($request->gender === "男性") {
            $gender = 1;
        } else {
            $gender = 2;
        }

        $contact = [
            'fullname' => $request->fullname,
            'gender' => $gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        if($request->input('back') == 'back') {
            return redirect('/')
                ->withInput();
        }
        Contact::create($contact);
        return view('thanks');
    }

    public function admin()
    {
        $contacts = Contact::Paginate(10);
        return view('admin', ['contacts' => $contacts]);
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $contact = Contact::query();
        if (isset($request->fullname)) {
            $contact->where('fullname', 'LIKE', "%{$request->fullname}%");
        };
        if (isset($request->email)) {
            $contact->where('email', 'LIKE', "%{$request->email}%");
        };
        if (isset($request->created_from)) {
            $contact->where('created_at', '>', "{$request->created_from}");
        };
        if (isset($request->created_to)) {
            $contact->where('created_at', '<', "{$request->created_to}");
        };
        if (isset($request->gender) && $request->gender === "男性") {
            $contact->where('gender', '1');
        };
        if (isset($request->gender) && $request->gender === "女性") {
            $contact->where('gender', '2');
        };
        $contacts = $contact->paginate(10);
        return view('admin', ['contacts' => $contacts]);
    }
}

