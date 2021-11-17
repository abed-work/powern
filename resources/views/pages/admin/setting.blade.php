@extends('layouts.admin-layout')

@section('content')
    <div class="card category-list">
        <div class="card-header"><i class="fas fa-clipboard-list"></i>Settings</div>
        <div class="card-body">
            <form action="{{route('dashboard.setting.update')}}" method="POST">
                @csrf
                @foreach ($settings as $setting)
                    <div class="form-group">
                        <div class="label">{{$setting->key}}</div>
                        <input type="text" name="{{$setting->key}}" id="" value="{{$setting->value}}">
                    </div>
                @endforeach
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Save changes">
                </div>
            </form>
            @if(session('success'))
                <div class="success">{{session('success')}}</div>
            @endif
        </div>
    </div>
@endsection
