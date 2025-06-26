@extends('layouts.app')

@section('title', __('lang.Ajouter un document'))

@section('content')
<div class="container py-4">
    <h1>{{ __('lang.Ajouter un document') }}</h1>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>{{ __('lang.Titre (français)') }}</label>
            <input type="text" name="title_fr" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>{{ __('lang.Titre (anglais)') }}</label>
            <input type="text" name="title_en" class="form-control">
        </div>
        <div class="mb-3">
            <label>{{ __('lang.Fichier') }} (PDF, ZIP, DOC)</label>
            <input type="file" name="file" class="form-control" required accept=".pdf,.zip,.doc,.docx">
        </div>
        <button class="btn btn-success">{{ __('lang.Enregistrer') }}</button>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">{{ __('lang.Annuler') }}</a>
    </form>
</div>
@endsection
