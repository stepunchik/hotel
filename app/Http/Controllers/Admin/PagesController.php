<?php

namespace App\Http\Controllers\admin;

use App\Models\PageContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
		$contents = PageContent::orderBy('created_at', 'desc')->paginate(5);

		return view('admin.pages.index', compact('contents'));
    }
	
	public function create() {
		$contents = PageContent::orderBy('created_at', 'desc')->paginate(5);

		return view('admin.pages.create', compact('contents'));
	}

    public function store(Request $request) {
		$request->validate([
			'about' => 'required',
			'info' => 'required',
			'rules' => 'required',
		]);

		PageContent::updateOrCreate(['section' => 'about'], ['content' => $request->about]);
		PageContent::updateOrCreate(['section' => 'info'], ['content' => $request->info]);
		PageContent::updateOrCreate(['section' => 'rules'], ['content' => $request->rules]);

		return redirect()->route('admin.pages.index')->with('success', 'Содержимое обновлено!');
    }
}
