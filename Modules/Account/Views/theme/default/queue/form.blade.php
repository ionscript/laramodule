@extends('account::theme.default.layouts.master')

@section('title') Queue Form @endsection

@section('content')
    <h2 class="ui header">Queue Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                @csrf
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Queue</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui required">
                                            <label class="control-label">Name: </label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="queue[name]" value="{{$queue['name'] ?? old('queue.name') ?? ''}}">
                                                @error('name')
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
                                                <input type="text" name="queue[description]" value="{{$queue['description'] ?? old('queue.description') ?? ''}}">
                                                @error('description')
                                                    <div class="ui tiny error message" style="display: block; margin-bottom: 1em">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Agents</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Agent:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <input type="text" name="agent" value="" placeholder="autocomplete" id="input-agent" class="form-control"/>
                                                <div id="agent" class="well well-sm" style="height: 150px; overflow: auto;">

                                                    @foreach($agents as $agent)
                                                        <div>
                                                            <i class="fa fa-minus-circle"></i> {{$agent->firstname}} {{$agent->lastname}}
                                                            <input type="hidden" name="agent[]" value="{{$agent->id}}"/>
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
                    <a href="{{route('account.queue')}}" class="ui button">Cancel</a>
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
        $('input[name=\'agent\']').autocomplete({
            'source': function (request, response) {
                $.ajax({
                    url: '{{route('account.queue.autocomplete')}}?name=' + encodeURIComponent(request),
                    dataType: 'json',
                    success: function (json) {
                        if(json.length === 0) {
                            json.unshift({
                                name: 0,
                                value: ' --- None --- '
                            });
                        }
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
                $('input[name=\'agent\']').val('');

                $('#agent' + item['value']).remove();

                $('#agent').append('<div id="agent' + item['value'] + '"><i class="fa fa-minus-circle" style="cursor: pointer"></i> ' + item['label'] + '<input type="hidden" name="agent[]" value="' + item['value'] + '" /></div>');
            }
        });

        $('#agent').delegate('.fa-minus-circle', 'click', function () {
            $(this).parent().remove();
        });
    </script>
@endpush