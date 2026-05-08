<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

            return view('admin.index', compact('contacts', 'categories'));
    }
    public function destroy(Request $request)
    {
        Contact::findOrFail($request->id)->delete();

        return redirect('/admin');
    }
    public function search(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($query) use ($keyword) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
    }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)->appends($request->query());
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($query) use ($keyword) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=contacts.csv',
        ];

        $callback = function () use ($contacts) {
            $stream = fopen('php://output', 'w');

            echo "\xEF\xBB\xBF";

            fputcsv($stream, [
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
                '作成日時',
            ]);

            foreach ($contacts as $contact) {
                $gender = match ((int) $contact->gender) {
                    1 => '男性',
                    2 => '女性',
                    3 => 'その他',
                    default => '',
                };

                fputcsv($stream, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $gender,
                    $contact->email,
                    '="' . $contact->tel . '"',
                    $contact->address,
                    $contact->building,
                    $contact->category->content ?? '',
                    $contact->detail,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($stream);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function reset()
    {
        return redirect('/admin');
    }
}
