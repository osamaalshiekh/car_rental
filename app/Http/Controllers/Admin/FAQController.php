<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $faq=new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();
        return redirect(to:'admin/faq');
    }

    public function show(Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    public function edit(string $id)
    {
        $faqs = FAQ::find($id);

        return view('admin.faq.edit', compact('faqs'));
    }

    public function update(Request $request, string $id)
    {
        $faqs=FAQ::find($id);
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;

        $faqs->save();
        return redirect(to:'admin/faq');
    }

    public function destroy(string $id)
    {
        $faqs = FAQ::find($id);
        if (!$faqs) {
            return redirect()->route('admin.faq.index')->with('error', 'faq not found');
        }

        if ($faqs->delete()) {
            // Redirect with success message if delete was successful
            return redirect()->route('admin.faq.index')->with('success', 'faq deleted successfully');
        } else {
            // Redirect with error message if delete failed
            return redirect()->route('admin.faq.index')->with('error', 'Failed to delete the FAQ');
        }
    }
}
