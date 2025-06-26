@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <h2 class="text-primary">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </h2>
                </div>

                <div class="card shadow">
                    <div class="card-body p-4">
                        <form method="POST" action="/login">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mot de passe -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" name="password" 
                                       class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <!-- Bouton de connexion -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt me-1"></i> Se connecter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lien vers l'inscription -->
                <div class="text-center mt-3">
                    <p>Pas encore de compte? <a href="/register">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection 