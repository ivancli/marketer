@extends('layouts.auth')

@section('links')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@stop

@section('body')
    <div id="marketer">
        <default-template>
            <content-template slot="default-content">
                <page-content-template slot="page-content">
                    <main-content slot="content-body"></main-content>
                </page-content-template>
            </content-template>
        </default-template>
    </div>
@stop

@section('scripts')
    <script src="{{mix('/js/app/auth/login.js')}}"></script>
@stop