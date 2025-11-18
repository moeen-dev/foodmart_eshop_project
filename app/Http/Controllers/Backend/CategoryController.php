<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|string|max:255',
                'category_slug' => 'required',
                'category_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            ],
            [
                'category_name.required' => 'Please enter a category name.',
                'category_slug.required' => 'Category slug is required.',
                'category_img.required' => 'Please enter a category image.',
                'category_img.image' => 'The upload file must be an image.',
                'category_img.mimes' => 'Image must be JPG, JPEG, PNG and WEBP.',
            ]
        );

        if ($request->hasFile('category_img')) {
            $file = $request->file('category_img');
            $extension = $file->getClientOriginalName();
            $filename = time() . '-category_img-' . $extension;
            $file->move('upload/images/', $filename);
            $input['category_img'] = $filename;
        }

        Category::create($validated);

        flash()->addSuccess('Category save successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
