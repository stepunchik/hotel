<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceValidation;
use App\Http\Requests\ServiceEditValidation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index() {
		$services = Service::orderBy('created_at', 'desc')->paginate(3);
		
		return view('admin.services.index', compact('services'));
    }

    public function create() {
		return view('admin.services.create');
    }

    public function edit(Service $service) {
        return view('admin.services.edit', compact('service'));
    }
	
	public function store(ServiceValidation $request) {
        $validatedData = $request->validated();
		
		$path = $request->file('image')->store('services', 'public');
		
		Service::create([
			'name' => $validatedData['name'],
            'description' => $validatedData['description'],
			'image' => $path,
		]);
		
		return redirect()->route('admin.services.index')->with('success', 'Услуга создана успешно.');
    }
	
	public function update(ServiceEditValidation $request, Service $service) {
        $validatedData = $request->validated();
		
		if ($request->hasFile('image')) {
			if ($service->image) {
				Storage::delete('public/' . $service->image);
			}

			$imagePath = $request->file('image')->store('services', 'public');
			$validatedData['image'] = $imagePath;
		} else {
			$validatedData['image'] = $service->image;
		}
		
		$service->update($validatedData);
		
		return redirect()->route('admin.services.index')->with('success', 'Услуга успешно изменена.');
    }
	
	public function destroy(Service $service) {
		Storage::delete('public/' . $service['image']);
		
        $service->delete();
		
		return redirect()->route('admin.services.index')->with('success', 'Услуга успешно удалена.');
    }
}
