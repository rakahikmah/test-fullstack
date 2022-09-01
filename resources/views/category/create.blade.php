@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <br>
            <div class="card">
                    <div class="card-header">
                        <h2>Add Category</h2>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-error" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name Category</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required>

                                <!-- error message untuk name -->
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('category.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                     </div>
            </div>
        </div>
    </div>
</div>
@endsection
