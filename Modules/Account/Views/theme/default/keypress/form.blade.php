@extends('account::theme.default.layouts.master')

@section('title') Keypress Form @endsection

@section('content')
    <h2 class="ui header">Keypress Form</h2>
    <div id="app">
        <div class="ui bottom customer-tab attached tab segment active">
            <form class="ui form attached fluid segment" method="post" action="{{$action}}">
                @csrf
                <div class="ui equal width aligned padded grid">
                    <div class="row">
                        <div class="six wide tablet eight wide computer column no-padding">
                            <div class="customer-section">
                                <h4>Keypress</h4>

                                <div class="ui items">
                                    <div class="item">
                                        <div class="ui">
                                            <label>Key:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="keypress[key]" class="select2">
                                                    <option value=""> --- Please Select --- </option>
                                                    <option value="1" {{($keypress['key'] ?? old('keypress.key')) == '1' ? 'selected' : ''}}>1</option>
                                                    <option value="2" {{($keypress['key'] ?? old('keypress.key')) == '2' ? 'selected' : ''}}>2</option>
                                                    <option value="3" {{($keypress['key'] ?? old('keypress.key')) == '3' ? 'selected' : ''}}>3</option>
                                                    <option value="4" {{($keypress['key'] ?? old('keypress.key')) == '4' ? 'selected' : ''}}>4</option>
                                                    <option value="5" {{($keypress['key'] ?? old('keypress.key')) == '5' ? 'selected' : ''}}>5</option>
                                                    <option value="6" {{($keypress['key'] ?? old('keypress.key')) == '6' ? 'selected' : ''}}>6</option>
                                                    <option value="7" {{($keypress['key'] ?? old('keypress.key')) == '7' ? 'selected' : ''}}>7</option>
                                                    <option value="8" {{($keypress['key'] ?? old('keypress.key')) == '8' ? 'selected' : ''}}>8</option>
                                                    <option value="9" {{($keypress['key'] ?? old('keypress.key')) == '9' ? 'selected' : ''}}>9</option>
                                                    <option value="0" {{($keypress['key'] ?? old('keypress.key')) == '0' ? 'selected' : ''}}>0</option>
                                                    <option value="*" {{($keypress['key'] ?? old('keypress.key')) == '*' ? 'selected' : ''}}>*</option>
                                                    <option value="#" {{($keypress['key'] ?? old('keypress.key')) == '#' ? 'selected' : ''}}>#</option>
                                                </select>
                                                @error('key')
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
                                            <label>Extension:</label>
                                        </div>
                                        <div class="middle aligned content">
                                            <div class="ui right floated">
                                                <select name="keypress[extension_id]" class="select2">
                                                    @forelse($extensions as $extension)
                                                        @if(($keypress['extension_id'] ?? old('keypress.extension_id')) === $extension->id)
                                                            <option value="{{$extension->id}}" selected>{{$extension->name}}</option>
                                                        @else
                                                            <option value="{{$extension->id}}">{{$extension->name}}</option>
                                                        @endif
                                                    @empty
                                                        <option value=""> --- None --- </option>
                                                    @endforelse
                                                </select>
                                                @error ('extension_id')
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

                    </div>
                </div>
                <div>
                    <a href="{{route('account.keypress')}}" class="ui button">Cancel</a>
                    <button type="reset" class="ui button">Reset</button>
                </div>
                <div class="btn">
                    <button class="ui button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
