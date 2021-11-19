@extends('layouts.admin-layout')

@section('content')
    <div class="flex">
        <div class="card">
            <div class="card-header">To be ..</div>
            <div class="card-body"></div>
        </div>
        <div class="card">
            <div class="card-header">To be ..</div>
            <div class="card-body"></div>
        </div>
        <div class="card">
            <div class="card-header">To be ..</div>
            <div class="card-body"></div>
        </div>
        <div class="card">
            <div class="card-header">To be ..</div>
            <div class="card-body"></div>
        </div>
        <div class="card">
            <div class="card-header">To be ..</div>
            <div class="card-body"></div>
        </div>
    </div>
    
    <style>
        .flex{
            display: flex;
            flex-wrap: wrap;
        }
        .flex > *{
            margin: 0 10px 20px 0;
            flex-basis: 30%;
            flex-grow: 1
        }
    </style>

@endsection