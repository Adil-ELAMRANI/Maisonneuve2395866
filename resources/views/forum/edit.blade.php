@extends('layouts.app')

@section('title', __('Modifier l\'article'))

@section('content')
<div class="container py-4" style="max-width: 650px;">
    <h1 class="mb-4">{{ __('Modifier l\'article') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('forum.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title_fr" class="form-label">{{ __('Titre (français)') }}</label>
            <input type="text" class="form-control" name="title_fr" id="title_fr" value="{{ old('title_fr', $article->title_fr) }}" required>
        </div>
        <div class="mb-3">
            <label for="content_fr" class="form-label">{{ __('Contenu (français)') }}</label>
            <textarea class="form-control" name="content_fr" id="content_fr" rows="4" required>{{ old('content_fr', $article->content_fr) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="title_en" class="form-label">{{ __('Title (English)') }}</label>
            <input type="text" class="form-control" name="title_en" id="title_en" value="{{ old('title_en', $article->title_en) }}">
        </div>
        <div class="mb-3">
            <label for="content_en" class="form-label">{{ __('Content (English)') }}</label>
            <textarea class="form-control" name="content_en" id="content_en" rows="4">{{ old('content_en', $article->content_en) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">{{ __('Enregistrer') }}</button>
        <a href="{{ route('forum.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
    </form>
</div>
@endsection
