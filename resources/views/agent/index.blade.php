@extends('layouts.app')

@section('content')

@if (Auth::User()->getSkill() == 1)
  @include('agent.index_quadplay')
@elseif (Auth::User()->getSkill() == 2)
  @include('agent.index_regional')
@endif

@endsection
