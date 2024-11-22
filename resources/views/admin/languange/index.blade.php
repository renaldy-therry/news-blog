@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Languange</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Languange</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.languange.create') }}" class="btn btn-primary">
                       <i class="fas fa-plus"></i>  Create new
                    </a>
                </div>
            </div>
            <div class="card-body">
                <p>Write Something here</p>
            </div>
        </div>
    </section>
@endsection
