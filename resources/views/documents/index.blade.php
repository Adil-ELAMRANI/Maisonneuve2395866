@extends('layouts.app')

@section('title', __('lang.Répertoire des documents'))

@section('content')
<div class="container py-4">
    <h1>{{ __('lang.Répertoire des documents') }}</h1>

    <a href="{{ route('documents.create') }}" class="btn btn-success mb-3">
        {{ __('lang.Ajouter un document') }}
    </a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('lang.Titre') }}</th>
                <th>{{ __('lang.Partagé par') }}</th>
                <th>{{ __('lang.Date') }}</th>
                <th>{{ __('lang.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documents as $document)
            <tr>
                <td>
                    {{ app()->getLocale() == 'fr' ? $document->title_fr : $document->title_en }}
                </td>
                <td>{{ $document->user->name ?? 'Inconnu' }}</td>
                <td>{{ $document->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('documents.download', $document) }}" class="btn btn-sm btn-primary" title="{{ __('lang.Télécharger') }}">
                        <i class="bi bi-download"></i>
                    </a>
                    @if($document->user_id == Auth::id())
                    <a href="{{ route('documents.edit', $document) }}" class="btn btn-sm btn-warning" title="{{ __('lang.Modifier') }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('lang.confirmer_suppression') }}')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">{{ __('lang.Aucun document trouvé.') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $documents->links() }}
    </div>
</div>
@endsection