@extends('layouts.app')

@section('title')
les utilisateurs
@endsection

@section('content')
<div class="columns">
        @include('layouts.left_column')
        <div class="column is-10">
                <div class="content is-medium">
                        <ul>
                                @foreach ($users as $user)
                                <li><a href="/users/{{ $user->id }}">{{ ucfirst($user->firstname) }} {{ strtoupper($user->lastname) }}</a></li>
                                @endforeach
                        </ul>
                </div>
        </div>
</div>
@endsection
