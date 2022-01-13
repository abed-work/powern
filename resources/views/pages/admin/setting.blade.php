@extends('layouts.admin-layout')

@section('content')
    <div class="card category-list">
        <div class="card-header"><i class="fas fa-clipboard-list"></i>Social media settings</div>
        <div class="card-body">
            <form action="{{route('dashboard.setting.update')}}" method="POST">
                @csrf
                @foreach ($settings as $setting)
                    <div class="form-group">
                        <div class="label">{{$setting->label}}</div>
                        <input type="text" name="{{$setting->key}}" id="{{$setting->key}}" value="{{$setting->value}}">
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

    <div class="card">
        <div class="card-header"><i class="fas fa-money-bill-wave-alt"></i> Currency Settings</div>
        <div class="card-body">
            <form action="{{ route('dashboard.currency.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="">Website Currency</div>
                    <div class="currencies">

                        <div class="currency lebanese-pound">
                            <label for="lbp">Lebanese Pound</label>
                            @if ($LBP->isActive)
                                <input id="lbp" type="checkbox" name="currency" value="LBP" checked>
                            @else
                                <input id="lbp" type="checkbox" name="currency" value="LBP">
                            @endif

                            <div class="usd" style="display: flex;align-items:center;justify-content:center;padding-top:30px">
                                @if ($LBP->isActive && $USD->isActive)
                                    <input style="width: 14px" type="checkbox" name="curren_usd" value="USD" checked>
                                @else
                                    <input style="width: 14px" type="checkbox" name="curren_usd" value="USD">
                                @endif
                                <div style="font-weight: bold" class="label">View USD</div>
                            </div>
                        </div>

                        <div class="currency turkish-lira">
                            <label for="tl">Turkish Lira</label>
                            @if ($TL->isActive)
                                <input id="tl" type="checkbox" name="currency" value="TL" checked>
                            @else
                                <input id="tl" type="checkbox" name="currency" value="TL">
                            @endif

                            <div class="usd" style="display: flex;align-items:center;justify-content:center;padding-top:30px">
                                @if ($TL->isActive && $USD->isActive)
                                    <input style="width: 14px" type="checkbox" name="curren_usd" value="USD" checked>
                                @else     
                                    <input style="width: 14px" type="checkbox" name="curren_usd" value="USD">                               
                                @endif
                                <div style="font-weight: bold" class="label">View USD</div>
                            </div>
                        </div>

                        <div class="currency us-dollar">
                            <label for="lbp">US Dollar</label>
                            @if ($USD->isActive && !$LBP->isActive && !$TL->isActive)
                                <input id="usd" type="checkbox" name="currency" value="USD" checked>
                            @else
                                <input id="usd" type="checkbox" name="currency" value="USD">
                            @endif
                        </div>

                    </div>
                    <div class="currency-fields">
                        <div class="LBP-field">
                            <div class="label">1 US dollar in lebanese lira</div>
                            <input type="text" name="LBP_value" value="{{ $LBP->value }}">
                        </div>
                        <div class="TL-field">
                            <div class="label">1 US dollar in Turkish lira</div>
                            <input type="text" name="TL_value" value="{{ $TL->value }}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <input class="save-btn" type="submit" value="Save changes">
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('input[name="currency"]').change(function(){
                if ($(this).prop('checked')){
                    $('input[name="currency"]').prop('checked',false);
                    $(this).prop('checked',true);
                }    
            });
                    
        });
    </script>
@endsection
