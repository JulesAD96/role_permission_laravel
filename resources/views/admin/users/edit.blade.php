@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Modifier ') }} {{$user->name}} </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        @foreach ($roles as $role)
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="roles[]" 
                                value="{{$role->id}}" id="{{$role->id}}"
                                @foreach ($user->roles as $userRole)
                                    @if ($userRole->id === $role->id) checked @endif
                                @endforeach
                            >
                            <label for="{{$role->id}}" class="form-check-label"> {{$role->name}} </label>
                        </div>
                        @endforeach
                        <button class="btn btn-primary" type="submit">Modifier les roles</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
