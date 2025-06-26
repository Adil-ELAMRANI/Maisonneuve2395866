<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // forum privé
    }

    /** Affiche la liste des articles */
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('forum.index', compact('articles'));
    }

    /** Formulaire de création */
    public function create()
    {
        return view('forum.create');
    }

    /** Enregistre un nouvel article */
    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'content_fr' => 'required|string',
            'title_en' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
        ]);

        Article::create([
            'user_id' => Auth::id(),
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'content_fr' => $request->content_fr,
            'content_en' => $request->content_en,
        ]);

        return redirect()->route('forum.index')->with('success', __('lang.Article ajouté avec succès.'));
    }

    /** Affiche un article */
    public function show(Article $article)
    {
        $article->load('user');
        return view('forum.show', compact('article'));
    }

    /** Formulaire de modification */
    public function edit(Article $article)
    {
        // Seul l’auteur peut éditer
        if ($article->user_id != Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        return view('forum.edit', compact('article'));
    }

    /** Met à jour un article */
    public function update(Request $request, Article $article)
    {
        if ($article->user_id != Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'content_fr' => 'required|string',
            'title_en' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
        ]);

        $article->update($request->only('title_fr', 'content_fr', 'title_en', 'content_en'));

        return redirect()->route('forum.index')->with('success', __('lang.Article modifié avec succès.'));
    }

    /** Supprime un article */
    public function destroy(Article $article)
    {
        if ($article->user_id != Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        $article->delete();
        return redirect()->route('forum.index')->with('success', __('Article supprimé avec succès.'));
    }
}
