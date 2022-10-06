@extends('layouts.app')
@section('content')
    <header>
        <h1 class="text-center">Users</h1>
    </header>
    <table class="table mt-2 container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-success mr-4">torna alla lista posts</a>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Phone</th>
                <th scope="col">Data di nascita</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->userDetail->first_name }}{{ $user->userDetail->last_name }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->userDetail->address }}</td>
                    <td>{{ $user->userDetail->phone }}</td>
                    <td>{{ $user->userDetail->birth_year }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">
                        <h4 class="text-center">Nessun Utente</h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
