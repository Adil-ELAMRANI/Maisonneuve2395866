@extends('layouts.app')

@section('title', 'Ajouter un Étudiant')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="h3 text-primary">
                        <i class="fas fa-user-plus me-2"></i>Nouvel étudiant
                    </h1>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Retour
                    </a>
                </div>

                <div class="card shadow-sm border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-id-card me-2"></i>Informations de l'étudiant
                        </h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('students.store') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-3 mb-4">
                                <!-- Nom -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label text-muted">
                                        <i class="fas fa-user me-1"></i> Nom complet <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" 
                                           class="form-control border-primary @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label text-muted">
                                        <i class="fas fa-envelope me-1"></i> Courriel <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" 
                                           class="form-control border-primary @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label text-muted">
                                        <i class="fas fa-phone me-1"></i> Téléphone <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" 
                                           class="form-control border-primary @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date de naissance -->
                                <div class="col-md-6">
                                    <label for="birth_date" class="form-label text-muted">
                                        <i class="fas fa-birthday-cake me-1"></i> Date de naissance <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" id="birth_date" name="birth_date" 
                                           class="form-control border-primary @error('birth_date') is-invalid @enderror" 
                                           value="{{ old('birth_date') }}" required>
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Adresse -->
                                <div class="col-12">
                                    <label for="address" class="form-label text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i> Adresse <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="address" name="address" 
                                           class="form-control border-primary @error('address') is-invalid @enderror" 
                                           value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ville -->
                                <div class="col-12">
                                    <label for="city_id" class="form-label text-muted">
                                        <i class="fas fa-city me-1"></i> Ville <span class="text-danger">*</span>
                                    </label>
                                    <select id="city_id" name="city_id" 
                                            class="form-select border-primary @error('city_id') is-invalid @enderror" required>
                                        <option value="">-- Sélectionnez une ville --</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between pt-3 border-top">
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-eraser me-1"></i> Réinitialiser
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Créer l'étudiant
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
