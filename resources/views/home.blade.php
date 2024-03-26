@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                <div class="col-md-8">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                </div>
                <div class="col-md-8">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Create user</a>
                </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
