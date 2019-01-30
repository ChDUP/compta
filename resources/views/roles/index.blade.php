@extends('layouts.app')

@section('title')
les rôles
@endsection

@section('content')
<div class="columns">
        @include('layouts.left_column')
        <div class="column is-10">
                <div class="content is-medium">
                        <ul>
                                @foreach ($roles as $role)
                                        <li> <a href="/roles/{{ $role->id }}">{{ $role->name }}</a></li>
                                @endforeach
                        </ul>
                </div>
        </div>
</div>
@endsection
