@extends('account::theme.default.layouts.master')

@section('title') Address Form @endsection

@section('content')
    <div class="ui bottom customer-tab attached tab segment active">
        <form class="ui form attached fluid segment" method="post" action="{{$action}}">
{{--            @csrf--}}
            <div class="ui equal width aligned padded grid">
                <div class="row">
                    <div class="six wide tablet eight wide computer column no-padding">
                        <div class="customer-section">
                            <h4>Address</h4>

                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">Name</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="name" value="{{$name ?? old('name') ?? ''}}">
                                            @if ($errors->has('name') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">Address Line 1:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="address_1" value="{{$address_1 ?? old('address_1')}}">
                                            @if ($errors->has('address_1') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('address_1') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Address Line 2:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="address_2" value="{{$address_2 ?? old('address_2')}}">
                                            @if ($errors->has('address_2') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('address_2') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">City:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="city" value="{{$city ?? old('city')}}">
                                            @if ($errors->has('city') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('city') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Zip Code:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <input type="text" name="postcode" value="{{$postcode ?? old('postcode')}}">
                                            @if ($errors->has('postcode') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('postcode') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">Country:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <select name="country_id" class="select2" onchange="country(this, {{$country_id ?? 1}}, {{$state_id ?? 0}})">
                                                <option value=""> --- Please Select --- </option>
                                                @foreach($countries as $country)
                                                    @if(($country_id ?? old('country_id')) === $country->id)
                                                    <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                                    @else
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('country_id') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('country_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui required">
                                        <label class="control-label">State:</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <select name="state_id"  class="select2">
                                                <option value=""> --- Please Select --- </option>
                                            </select>
                                            @if ($errors->has('state_id') )
                                                <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                    {{ $errors->first('state_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui items">
                                <div class="item">
                                    <div class="ui">
                                        <label>Default</label>
                                    </div>
                                    <div class="middle aligned content">
                                        <div class="ui right floated">
                                            <div class="ui checkbox">
                                                <input type="checkbox" value="1" name="default" {{ $default ?? (old('default') ? 'checked' : '') }}>
                                                <label></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn">
                <button class="ui button" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function country(element, index, state_id) {
            $.ajax({
                url: '/account/address/state?id=' + element.value,
                dataType: 'json',
                beforeSend: function() {
                    $('select[name=\'country_id\']').prop('disabled', true);
                },
                complete: function() {
                    $('select[name=\'country_id\']').prop('disabled', false);
                },
                success: function(state) {

                    let html = '<option value=""> --- Please Select --- </option>';

                    if (state && state !== '') {
                        for (let i = 0; i < state.length; i++) {
                            html += '<option value="' + state[i]['id'] + '"';

                            if (state[i]['id'] === state_id) {
                                html += ' selected="selected"';
                            }

                            html += '>' + state[i]['name'] + '</option>';
                        }
                    } else {
                        html += '<option value="0"> --- Nome --- </option>';
                    }

                    $('select[name=\'state_id\']').html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }

        $('select[name=\'country_id\']').trigger('change');
    </script>
@endpush