<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Contracts\CreatesCategories;
use App\Actions\Contracts\DeletesCategories;
use App\Actions\Contracts\UpdatesCategories;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.category.index', [
            'categories' => Category::withCount('news')->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatesCategories $creator, StoreCategoryRequest $request)
    {
        $creator->create($request->validated());

        return redirect()->route('admin.category.index')->with([
            'message' => 'Category berhasil ditambahkan',
            'type'    => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesCategories $updater, UpdateCategoryRequest $request, Category $category)
    {
        $updater->update($category, $request->validated());

        return redirect()->route('admin.news.index')->with([
            'message' => 'Category berhasil diperbarui',
            'type'    => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletesCategories $deleter, DestroyCategoryRequest $request, Category $category)
    {
        $deleter->delete($category);

        return redirect()->route('admin.news.index')->with([
            'message' => 'Category berhasil dihapus',
            'type'    => 'success',
        ]);
    }
}
