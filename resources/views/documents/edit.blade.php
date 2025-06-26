@extends('layouts.app')

@section('title', __('lang.Modifier le document'))

@section('content')
<div class="container py-4">
    <h1>{{ __('lang.Modifier le document') }}</h1>
    <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>{{ __('lang.Titre (français)') }}</label>
            <input type="text" name="title_fr" class="form-control" required value="{{ old('title_fr', $document->title_fr) }}">
        </div>
        <div class="mb-3">
            <label>{{ __('lang.Titre (anglais)') }}</label>
            <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $document->title_en) }}">
        </div>
        <div class="mb-3">
            <label>{{ __('lang.Fichier') }} (PDF, ZIP, DOC) <small class="text-muted">({{ __('lang.Laisser vide pour conserver le fichier actuel') }})</small></label>
            <input type="file" name="file" class="form-control" accept=".pdf,.zip,.doc,.docx">
            @if($document->filename)
                <div class="mt-2">
                    <a href="{{ route('documents.download', $document) }}" class="btn btn-link" target="_blank">
                        {{ __('lang.Télécharger le fichier actuel') }}
                    </a>
                </div>
            @endif
        </div>
        <button class="btn btn-success">{{ __('lang.Enregistrer') }}</button>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">{{ __('lang.Annuler') }}</a>
    </form>
</div>
@endsection
