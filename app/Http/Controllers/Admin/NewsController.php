<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Contracts\CreatesNews;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.admin.news.index', [
            'news' => News::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.admin.news.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(CreatesNews $creator, StoreNewsRequest $request)
    {
        $creator->create(Auth::user(), array_merge($request->validated(), ['category_id' => $request->category_id]));

        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil ditambahkan',
            'type'    => 'success',
        ]);
    }

    public function edit(News $news)
    {
        $categories = Category::all();

        return view('pages.admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $news->update([
            'title'       => $request->title,
            'content'     => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil diperbarui',
            'type'    => 'success',
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with([
            'message' => 'Berita berhasil dihapus',
            'type'    => 'success',
        ]);
    }
}
