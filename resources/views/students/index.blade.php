@extends('layouts.app')

@section('title', 'Liste des étudiants')
@section('header', 'Étudiants')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm mx-auto" style="max-width: 800px;">
        <!-- En-tête amélioré -->
        <div class="card-header bg-primary bg-opacity-10 border-bottom-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-1 text-primary">
                        <i class="bi bi-people-fill me-2"></i>Gestion des étudiants
                    </h1>
                    <p class="text-muted small mb-0">Liste des étudiants enregistrés</p>
                    <p class="text-primary text-opacity-75 small mb-0">
                        {{ $students->total() }} étudiant(s) enregistré(s)
                    </p>
                </div>
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Ajouter
                </a>
            </div>
        </div>

        <!-- Tableau optimisé -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 w-100">
                    <thead class="table-light">
                        <tr>
                            <th class="w-40">Nom</th>
                            <th class="w-30">Ville</th>
                            <th class="w-30 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <p class="mb-0 fw-medium">{{ $student->name }}</p>
                                        <small class="text-muted">ID: {{ $student->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    {{ $student->city->name ?? 'Non spécifié' }}
                                </span>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-end gap-1">
                                    <a href="{{ route('students.show', $student) }}"
                                        class="btn btn-outline-info btn-sm px-2"
                                        title="Détails">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}"
                                        class="btn btn-outline-warning btn-sm px-2"
                                        title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm px-2"
                                            onclick="return confirm('Confirmer la suppression ?')"
                                            title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                <i class="bi bi-database-exclamation fs-4"></i>
                                <p class="mb-0">Aucun étudiant enregistré</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination centrée -->
        @if($students->hasPages())
        <div class="card-footer bg-white border-top-0 py-3">
            <div class="d-flex justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
        @endif

    </div>
</div>
@endsection