<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {


        $articles = Post::with('media')->get();
        foreach ($articles as $article) {
            if($article->getMedia('images')->first() != null) {
                $article['image'] = $article->getMedia('images')->first()->getUrl();
                unset($article['media']);
            } else {
                unset($article['media']);
            }
        }
        return Inertia::render('Articles', [
        'articles' => $articles
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $medias = Media::all();
        return Inertia::render('Post/Create', [
            'medias' => $medias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(StorePostRequest $request)
    {
        /*
        $title = explode(' ', $request->title);
        $title = implode('-', $title);
        */
        /*
        $request->merge([
            'slug' => $title,
        ]);
        */
        $article = Post::create($request->except('image'));
        if($request->file('image')) {
            $article->addmedia($request->file('image'))->toMediaCollection('images');
        }

        return Inertia::render('Articles', [
           'article' => $article
        ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Inertia\Response
     */
    public function show($slug)
    {

        $article = Post::findBySlugOrFail($slug);
        if($article->getMedia('images')->count() > 0) {
            $article['image'] = $article->getMedia('images')->first()->getUrl();
        }
        return Inertia::render('Post/Show', [
           'article' => $article
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Post::findorFail($id)->delete();
        return Redirect::route('articles.index', [
            'message', 'Item deleted'
        ]);
    }
}
