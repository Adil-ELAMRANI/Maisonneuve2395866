<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
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
        $documents = Document::with('user')->latest()->paginate(10);
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,zip,doc,docx|max:5120', // max 5Mo
        ]);

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        Document::create([
            'user_id' => Auth::id(),
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'filename' => $path,
        ]);

        return redirect()->route('documents.index')->with('success', __('lang.Document ajouté avec succès.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
        ]);

        // Optionnel : gérer un nouveau fichier
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->filename); // delete old
            $path = $request->file('file')->store('documents', 'public');
            $document->filename = $path;
        }

        $document->title_fr = $request->title_fr;
        $document->title_en = $request->title_en;
        $document->save();

        return redirect()->route('documents.index')->with('success', __('lang.Document modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403, __('lang.Une erreur est survenue'));
        }
        Storage::disk('public')->delete($document->filename);
        $document->delete();

        return redirect()->route('documents.index')->with('success', __('lang.Document supprimé avec succès.'));
    }

    public function download(Document $document)
    {
        // Optionnel : vérifier accès (ici tout connecté)
        return Storage::disk('public')->download($document->filename);
    }
}
