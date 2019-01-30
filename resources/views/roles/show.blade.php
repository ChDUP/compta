@extends('layouts.app')

@section('title')
rôle : {{ $role->name }}
@endsection

@section('content')
<div class="columns">
    @include('layouts.left_column')
    <div class="column is-10">
        <div class="content is-medium">
                @if ($role->users->count())
                <ul>
                    @foreach ($role->users as $user)
                        <li><a href="/users/{{ $user->id }}">{{  ucfirst($user->firstname) }} {{ strtoupper($user->lastname) }}</a></li>
                    @endforeach
                </ul>
                @else
                <p>Il n'y a aucun utilisateur avec le rôle {{ $role->name }}.</p>
                @endif
                <p>
                    <a href="/roles">Voir tous les rôles</a>
                </p>
        </div>
    </div>
</div>
@endsection
