@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="alert alert-success" role="alert">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <strong>Well done!</strong> You successfully logged in. Click <a href="/agent/workspace" class="alert-link">here</a> or wait while we are redirecting you.
                    @php
                        header( "refresh:2;url=/agent/workspace" );
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
