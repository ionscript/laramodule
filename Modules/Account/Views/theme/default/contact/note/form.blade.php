@extends('admin::theme.default.layouts.master')

@section('title') Agent Contact Note Form @endsection

@section('content')
    <!-- ADD CONTACT NOTE -->
    <div id="addContactNote" class="overlay">
        <div id="popup-addnote" class="popup addnew">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form class="ui form" id="addNoteForm">
                    <div class="inline fields">
                        <label>Text</label>
                        <div class="field">
                            <textarea></textarea>
                        </div>
                    </div>
                    <div class="ui submit button" id="saveNote"><i class="fas fa-check"></i>Save</div>
                </form>
            </div>
        </div>
    </div>
@endsection
