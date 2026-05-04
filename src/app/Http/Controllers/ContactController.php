<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'detail',
        ]);
        $contact['tel1'] = $request->tel1;
        $contact['tel2'] = $request->tel2;
        $contact['tel3'] = $request->tel3;
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        $category = Category::find($contact['category_id']);

        return view('contact.confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect('/')->withInput();
        }

        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
        ]);

        Contact::create($contact);

        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}
