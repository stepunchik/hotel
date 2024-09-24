<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsValidation;
use App\Http\Requests\NewsEditValidation;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index() {
		$news = News::orderBy('created_at', 'desc')->paginate(10);
		
		return view('admin.news.index', compact('news'));
    }

    public function create() {
		return view('admin.news.create');
    }

    public function edit(News $news) {
		return view('admin.news.edit', compact('news'));
    }

    public function store(NewsValidation $request) {
        $validatedData = $request->validated();
		
		$path = $request->file('image')->store('news', 'public');
		
		News::create([
			'title' => $validatedData['title'],
            'text' => $validatedData['text'],
			'image' => $path,
		]);
		
		return redirect()->route('admin.news.index')->with('success', 'Новость создана успешно.');
    }
	
	public function update(NewsEditValidation $request, News $news) {
		$validatedData = $request->validated();
		
		if ($request->hasFile('image')) {
			if ($news->image) {
				Storage::delete('public/' . $news['image']);
			}

			$imagePath = $request->file('image')->store('news', 'public');
			$validatedData['image'] = $imagePath;
		} else {
			$validatedData['image'] = $news->image;
		}

		$news->update($validatedData);
		
		return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена.');
	}
	
	public function destroy(News $news) {		
		Storage::delete('public/' . $news['image']);

		$news->delete();
		
		return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена.');
	}
}
