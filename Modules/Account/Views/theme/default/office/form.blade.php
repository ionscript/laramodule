@extends('account::theme.default.layouts.master')

@section('title') Office Form @endsection

@section('content')
    <h2 class="ui header"> Office Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                @csrf
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Office</h4>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="office[name]" value="{{$office['name'] ?? old('office.name') ?? ''}}">
                                                @error ('name')
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Description: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="office[description]" value="{{$office['description'] ?? old('office.description') ?? ''}}">
                                                @error ('description')
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Address:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="office[address_id]" class="select2">
                                                    <option value="0"> Default </option>
                                                    @foreach($addresses as $address)
                                                        @if(($office['address_id'] ?? old('office.address_id')) === $address->id)
                                                            <option value="{{$address->id}}" selected>{{$address->name}}</option>
                                                        @else
                                                            <option value="{{$address->id}}">{{$address->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('address_id')
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
                                                    <input type="checkbox" value="1" name="office[default]" {{ $office['default'] ?? (old('office.default') ? 'checked' : '') }}>
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Departments</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Department:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="department" value="" placeholder="autocomplete"
                                                       id="input-department" class="form-control"/>
                                                <div id="department" class="well well-sm"
                                                     style="height: 150px; overflow: auto;">

                                                    @foreach($departments as $department)
                                                        <div>
                                                            <i class="fa fa-minus-circle"></i> {{$department->name}}
                                                            <input type="hidden" name="department[]"
                                                                   value="{{$department->id}}"/>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <a href="{{route('account.office')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('input[name=\'department\']').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: '{{route('account.office.autocomplete')}}?name=' + encodeURIComponent(request),
                    dataType: 'json',
                    success: function (json) {
                        json.unshift({
                            name: 0,
                            value: ' --- None --- '
                        });
                        response($.map(json, function (item) {
                            return {
                                label: item['value'],
                                value: item['name']
                            }
                        }));
                    }
                });
            },
            'select': function (item) {
                $('input[name=\'department\']').val('');

                $('#department' + item['value']).remove();

                $('#department').append('<div id="department' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="department[]" value="' + item['value'] + '" /></div>');
            }
        });

        $('#department').delegate('.fa-minus-circle', 'click', function () {
            $(this).parent().remove();
        });
    </script>
@endpush
