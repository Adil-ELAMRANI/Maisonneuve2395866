@extends('layouts.app')

@section('title', 'Détails de l\'Étudiant')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- En-tête avec bouton retour -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="h3 text-primary">
                    <i class="fas fa-user-graduate me-2"></i>Profil de l'étudiant
                </h1>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>

            <!-- Carte principale -->
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-id-card me-2"></i>Informations personnelles
                    </h5>
                    <div class="btn-group">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-light">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>
                    </div>
                </div>

                <!-- Corps de la carte -->
                <div class="card-body">
                    <!-- Section Photo + Infos basiques -->
                    <div class="row mb-4">

                        <div class="col-md-9">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <h6 class="text-muted small mb-1">Nom complet</h6>
                                    <p class="h5">{{ $student->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted small mb-1">Email</h6>
                                    <p class="h5">
                                        <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                            {{ $student->email }}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted small mb-1">Téléphone</h6>
                                    <p class="h5">
                                        {{ $student->phone }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted small mb-1">Date de naissance</h6>
                                    <p class="h5">{{ \Carbon\Carbon::parse($student->birth_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Adresse -->
                    <div class="border-top pt-3 mb-4">
                        <h5 class="text-primary mb-3">
                            <i class="fas fa-map-marked-alt me-2"></i>Adresse
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <h6 class="text-muted small mb-1">Adresse postale</h6>
                                <p class="h5">{{ $student->address }}</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted small mb-1">Ville</h6>
                                <p class="h5">{{ $student->city->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section complémentaire (cursus) -->
                    <div class="border-top pt-3">
                        <h5 class="text-primary mb-3">
                            <i class="fas fa-graduation-cap me-2"></i>Parcours académique
                        </h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Les détails du parcours académique seront affichés ici lorsque disponibles.
                        </div>
                    </div>
                </div>

                <!-- Pied de carte -->
                <div class="card-footer bg-light d-flex justify-content-between">
                    <small class="text-muted">
                        <i class="fas fa-calendar-plus me-1"></i>
                        Créé le : {{ $student->created_at->format('d/m/Y H:i') }}
                    </small>
                    <small class="text-muted">
                        <i class="fas fa-calendar-edit me-1"></i>
                        Dernière modification : {{ $student->updated_at->format('d/m/Y H:i') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection