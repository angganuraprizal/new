@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                @if (session()->has('flash_notification.message'))
                <div class="container">
                    <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! session()->get('flash_notification.message') !!}
                    </div>
                </div>
                @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ asset('img/newspaper.png') }}" width="50px" alt="">
                                </div>
                                <div class="col-md-3">
                                    <label for=""><b>Jumlah Artikel</b></label><br>
                                    {{ $artikels->count() }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
