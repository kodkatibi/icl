@extends('layouts.master')

@section('page_title')
    {{ 'Games' }}
@stop
@section('header')
    Games
@stop
@section('content-wrapper')

    <div class="row d-flex justify-content-center mt-100 mb-100">


        <div class="col-lg-6">

            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title m-b-0">Teams</h4>
                </div>
                <ul class="list-style-grid">

                    @foreach($teams as $team)
                        <li class="d-flex no-block card-body">
                            <div>
                                <span class="text-muted">{{$team->name}} </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a type="button" class="btn btn-primary" href="{{ route('games.index') }}">
                    Pick Teams
                </a>
                @if(url()->current() == route('games.index'))
                    <a type="button" class="btn btn-success"
                       href="{{route('games.generate-fixture')}}">
                        Generate Fixture
                    </a>
                @endif
            </div>

        </div>
    </div>

@stop
