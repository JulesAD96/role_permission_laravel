@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Liste des users') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (Session::has('message'))
                                <div class="alert alert-warning"> {{session('message')}} </div>
                            @endif
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row"> {{ $user->id }} </th>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }} </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"> <button class="btn btn-primary">Editer</button> </a>
                                        <form action="{{ route('admin.users.destroy',$user->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Supprimer</button> 
                                        </form>
                                    </td>
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
