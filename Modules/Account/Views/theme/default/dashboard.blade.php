@extends('account::theme.default.layouts.master')
@section('title', 'Main Page')
@section('content')
    <div class="ui bottom active main-page attached tab segment" id="front">
        <div class="heading-style">
            <h3>Welcome to Front Office. </h3>
            <h3>it's easy to get your system up and running! Simply:</h3>
        </div>
        <div class="ui message">
            <p>Click the <a href=""> extensions </a> tab above to customize your extensions</p>
        </div>
        <div class="ui message">
            <p>Then click <a href="#"> edit call menu </a> to begin building your call menu.</p>
        </div>
        <div class="ui message">
            <p>Then, record a personalized greeting by clicking <a href="#"> voice prompts </a> above.</p>
        </div>
    </div>
@endsection
