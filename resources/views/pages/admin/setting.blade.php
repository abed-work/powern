@extends('layouts.admin-layout')

@section('content')
    <div class="card category-list">
        <div class="card-header"><i class="fas fa-clipboard-list"></i>Settings</div>
        <div class="card-body">
            <form action="{{route('dashboard.setting.update')}}" method="POST">
                @csrf
                @foreach ($settings as $setting)
                    <div class="form-group">
                        <div class="label">{{$setting->label}}</div>
                        <input type="text" name="{{$setting->key}}" id="{{$setting->key}}" value="{{$setting->value}}">
                    </div>
                @endforeach
                <div class="form-group">
                    <div class="label">Final Dollar rate in LBP </div>
                    <input type="number" name="finalprice" id="finalprice" placeholder="" value="{{$settings[3]->value + $settings[4]->value}}" readonly style="background-color: #d4d4d4">
                </div>
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Save changes">
                </div>
            </form>
            @if(session('success'))
                <div class="success">{{session('success')}}</div>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#dollarRate').keyup(function(e){
                let extra = ($('#extra').attr('value'));
                $('#finalprice').attr('value',(parseInt(e.currentTarget.value) + parseInt(extra)));
            });

            $('#extra').keyup(function(e){
                let dollarRate = ($('#dollarRate').attr('value'));
                $('#finalprice').attr('value',(parseInt(e.currentTarget.value) + parseInt(dollarRate) ));
            })
        })
    </script>
@endsection
