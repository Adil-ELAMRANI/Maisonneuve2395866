@extends('layouts.app')

@section('title', __('Article'))

@section('content')
<div class="container py-4" style="max-width: 750px;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">
                {{-- Titre selon la langue --}}
                {{ app()->getLocale() == 'fr' ? $article->title_fr : ($article->title_en ?: $article->title_fr) }}
            </h2>
        </div>
        <div class="card-body">
            <div class="mb-3 text-muted small">
                {{ __('Publié par') }}
                <strong>
                    {{-- Si la relation user existe et a un nom, sinon "Auteur inconnu" --}}
                    {{ optional($article->user)->name ?? __('Auteur inconnu') }}
                </strong>
                &nbsp;|&nbsp;
                @if($article->created_at)
                    {{ $article->created_at->format('d/m/Y H:i') }}
                @else
                    <em>{{ __('Aucune date') }}</em>
                @endif
            </div>
            <div class="mb-4">
                {!! nl2br(e(app()->getLocale() == 'fr' ? $article->content_fr : ($article->content_en ?: $article->content_fr))) !!}
            </div>
            <a href="{{ route('forum.index') }}" class="btn btn-outline-primary">{{ __('Retour au forum') }}</a>
            @if(Auth::id() === $article->user_id)
                <a href="{{ route('forum.edit', $article) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                <form action="{{ route('forum.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Confirmer la suppression ?') }}');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
