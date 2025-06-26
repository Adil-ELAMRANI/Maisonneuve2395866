@extends('layouts.app')

@section('title', __('Accès interdit'))

@section('content')
<div class="container text-center py-5">
    <h1 class="display-4 text-danger">403</h1>
    <p class="lead">{{ __('lang.Une erreur est survenue') }}</p>
    <p>{{ __("Vous n'avez pas l'autorisation d'accéder à cette page.") }}</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary">{{ __('Retour') }}</a>
</div>
@endsection
