<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('contact.index', compact('categories'));
    }

    public function confirm(Request $request)
    {
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

        $category = Category::find($contact['category_id']);

        return view('contact.confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
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
