<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        // con select mi passo solo i campi di cui ho bisogno
        $categories = Category::select('id', 'label')->get();
        // con select mi passo solo i campi di cui ho bisogno
        $tags = Tag::select('id', 'label')->get();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        // collego l'utento collegato al post
        $post->user_id = Auth::id();
        $post->save();
        // collego i tag al post dopo che il post è stato salvato altrimenti non posso associare l'id del post al tag.
        // se non metto le parentesi dopo tags chiamo tutti i tags, invece cosi facendo chiamo solo la relazione.
        // faccio l'if per controllare se esiste la chiave di tags per poi attacarla, altrimenti il programma si spacca perchè se non gli arriva nulla non può attaccare nulla.
        if (array_key_exists('tags', $data));
        $post->tags()->attach($data['tags']);

        return redirect()->route('admin.posts.show', $post)
            ->with('message', 'Post creato con successo')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::select('id', 'label')->get();
        // con select mi passo solo i campi di cui ho bisogno
        $tags = Tag::select('id', 'label')->get();
        // mi preparo un array di tags id precedenti per far si che all'edit del post i tags rimangano selezionati
        $prev_tags = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'prev_tags'));
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
        $post = Post::findOrFail($id);
        $data = $request->all();
        $post->fill($data);

        // fatto per far si che se diseleziono i checkbox il programma non vada in errore
        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }
        $post->save();
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // faccio la condizione per contare se il post ha dei tags per toglierli e poi eliminare il post
        if (count($post->tags)) $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('message', 'il Post è stato eliminato con successo')
            ->with('type', 'danger');
    }
}
