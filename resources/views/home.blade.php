@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in as: {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">API Keys</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->api_key == null)
                        No API keys for this user.<br>
                        <form method="post" action="/generate">
                        <button type="submit">Generate API Key</button>
                        @csrf
                        </form>
                    @else
                        <table class="width:100%">
                            <thead style="border: 2px solid black"><tr><th>API KEY</th></tr></thead>
                            <tbody style="border: 2px solid black"><tr><td>{{Auth::user()->api_key}}</td></tr></tbody>
                        </table><br>
                        <form method="post" action="/revoke">
                            <button type="submit">Revoke API Key</button>
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
