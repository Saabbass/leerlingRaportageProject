@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Goal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('goals.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="goal_name" class="form-label">Goal Name</label>
                            <input type="text" class="form-control @error('goal_name') is-invalid @enderror" id="goal_name" name="goal_name" value="{{ old('goal_name') }}" required>
                            @error('goal_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="goal_description" class="form-label">Description</label>
                            <textarea class="form-control @error('goal_description') is-invalid @enderror" id="goal_description" name="goal_description" rows="3" required>{{ old('goal_description') }}</textarea>
                            @error('goal_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="target_date" class="form-label">Target Date</label>
                            <input type="date" class="form-control @error('target_date') is-invalid @enderror" id="target_date" name="target_date" value="{{ old('target_date') }}" required>
                            @error('target_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Create Goal</button>
                            <a href="{{ route('goals.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
