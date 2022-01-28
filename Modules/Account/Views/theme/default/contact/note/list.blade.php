@extends('admin::theme.default.layouts.master')

@section('title') Agent Contact Note List @endsection

@section('content')
    <!-- VIEW CONTACT NOTES -->
    <div id="viewContactNotes" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
                <a class="btn-add-note" role="button" id="addNote" href="#addContactNote">
                    <i class="fas fa-edit"></i>
                    Add note
                </a>
                <table class="ui celled striped table unstackable" id="contactNotesTable" style="width: 100%;">
                    <thead>
                    <tr>
                        <th class="left aligned collapsing five wide">
                            Text
                        </th>
                        <th class="center aligned collapsing one wide">
                            Date
                        </th>
                        <th class="center aligned collapsing one wide">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
