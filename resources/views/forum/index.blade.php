@extends('layouts.app')

@section('title', __('Forum'))

@section('content')
<div class="container py-4">
    <h1 class="mb-4">{{ __('Forum des étudiants') }}</h1>

    <a href="{{ route('forum.create') }}" class="btn btn-primary mb-3">
        {{ __('Nouvel article') }}
    </a>

    @if($articles->count())
        <div class="list-group">
            @foreach($articles as $article)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <a href="{{ route('forum.show', $article) }}" class="text-decoration-none">
                                <strong>
                                    {{ app()->getLocale() == 'fr' ? $article->title_fr : $article->title_en }}
                                </strong>
                            </a>
                            <div class="small text-muted">
                                {{ $article->user->name ?? 'Auteur inconnu' }},
                                {{ $article->created_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                        @if(Auth::id() === $article->user_id)
                            <div class="btn-group ms-2">
                                <a href="{{ route('forum.edit', $article) }}" class="btn btn-outline-warning btn-sm" title="{{ __('Modifier') }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('forum.destroy', $article) }}" method="POST" onsubmit="return confirm('{{ __('Confirmer la suppression ?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="{{ __('Supprimer') }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $articles->links() }}
        </div>
    @else
        <p class="text-muted">{{ __('Aucun article pour le moment.') }}</p>
    @endif
</div>
@endsection
