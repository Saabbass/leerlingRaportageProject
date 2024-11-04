@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Goals List</span>
                    <a href="{{ route('goals.create') }}" class="btn btn-primary btn-sm">Create New Goal</a>
                    <a href="{{ route('goals.index') }}" class="btn btn-secondary btn-sm">View All Goals</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Target Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($goals as $goal)
                                    <tr>
                                        <td>{{ $goal->goal_name }}</td>
                                        <td>{{ Str::limit($goal->goal_description, 50) }}</td>
                                        <td>{{ $goal->target_date->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No goals found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($goals->hasPages())
                        {{ $goals->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
