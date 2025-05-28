@extends('layouts.app')

@section('title', 'Liste des villes')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-city me-2"></i>Liste des villes
                        </h5>
                        <span class="badge bg-light text-primary fs-6">
                            {{ $cities->count() }} villes
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($cities as $city)
                        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <div>
                                <span class="fw-bold text-primary">{{ $loop->iteration }}.</span>
                                <span class="ms-2 fs-5">{{ $city->name }}</span>
                            </div>
                            <span class="badge bg-light text-muted border">
                                ID: {{ $city->id }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if($cities->hasPages())
                <div class="card-footer bg-light">
                    {{ $cities->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
