<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::paginate(10);
        $articles = Auth::user()->articles()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->image);
        
        
        
        $validated = $request->validate([
            'title' => ['required', 'unique:articles'],
            'content' => 'required',
            'image' => 'nullable|image|max:200',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        $validated['user_id'] = Auth::id();
        
        $image_path = Storage::put('post-img', $request->file('image'));
        $validated['image'] = $image_path;
        $addSlug = Arr::add($validated, 'slug', Str::slug($request->title));
        $article = Arr::add($addSlug, 'post_date', date("Y-m-d"));

        // ddd($article);

        $new_article = Article::create($article);

        // ddd($new_article);

        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id',

            ]);
        }
        $new_article->tags()->attach($request->tags);

        return redirect()->route('admin.articles.index')->with('message', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('guest.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $tags = Tag::all();
        $categories = Category::all();

        if (Auth::id() === $article->user_id) {
            return view('admin.articles.edit', compact('article', 'categories', 'tags'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if (Auth::id() === $article->user_id) {
            $validated = $request->validate([
                'title' => ['required', Rule::unique('articles')->ignore($article->id)],
                'content' => 'required',
                'image' => 'nullable',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            $data = Arr::add($validated, 'slug', Str::slug($request->title));
            // ddd($data);

            $article->update($data);

            if ($request->has('tags')) {
                $request->validate([
                    'tags' => 'nullable|exists:tags,id',

                ]);
            }
            $article->tags()->sync($request->tags);

            return redirect()->route('admin.articles.index')->with('message', 'Article Changed Successfully!');

        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (Auth::id() === $article->user_id) {
            $article->delete();
            return redirect()->route('admin.articles.index')->with('alert', 'Article Deleted Permanently!');

        } else {
            abort(403);
        }

    }
}
