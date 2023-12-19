<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->when(request()->q, function ($news) {
            $news = $news->where('title', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::all();

        return view('admin.news.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'category_id'  => 'required',
            'title'  => 'required',
            'content'  => 'required',
            'author'  => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/news', $image->hashName());

        //save to DB
        $news = News::create([
            'image'  => $image->hashName(),
            'category_id'   => $request->category_id,
            'title'   => $request->title,
            'content'   => $request->content,
            'author'   => $request->author,
        ]);

        if ($news) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.news.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.news.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        $news = News::findOrFail($id);
        $category = Categories::all();

        return view('admin.news.edit', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'category_id'  => 'required',
            'title'  => 'required',
            'content'  => 'required',
            'author'  => 'required',
            // 'name'  => 'required|unique:categories,name,'.$category->id 
        ]);


        if ($request->file('image') == '') {

            $news = News::findOrFail($news->id);
            $news->update([
                'category_id'   => $request->category_id,
                'title'   => $request->title,
                'content'   => $request->content,
                'author'   => $request->author,
            ]);
        } else {

            //hapus image lama
            Storage::disk('local')->delete('public/news/' . basename($news->image));

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/news', $image->hashName());

            //update dengan image baru
            $news = News::findOrFail($news->id);
            $news->update([
                'image'  => $image->hashName(),
                'category_id'   => $request->category_id,
                'title'   => $request->title,
                'content'   => $request->content,
                'author'   => $request->author,
            ]);
        }

        if ($news) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.news.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.news.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $image = Storage::disk('local')->delete('public/news/' . basename($news->image));
        $news->delete();

        if ($news) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
