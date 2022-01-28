@extends('account::theme.default.layouts.master')

@section('title') Office List @endsection

@section('content')
    <div class="ui bottom attached segment" id="app" style="border: none">
        <div>
            <div class="content">
                <div class="ui styled">
                    <div class="title active">
                        <div class="ui top attached menu">
                            <div class="left menu">
                                <h4 class="ui header">Office List</h4>
                            </div>
                            <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                                <a href="{{route('account.office.add')}}" class="ui primary icon button" data-tooltip="Add new" data-inverted="" >
                                    <i class="icon plus"></i>
                                </a>
                            </div>
                            <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                                <button class="ui negative icon button" type="button" onclick="confirm('Are you sure?') ? $('#form-office').submit() : false;" data-tooltip="Delete" data-inverted="">
                                    <i class="icon trash alternate"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content active">
                        <form action="{{ route('account.office.delete') }}" method="post" enctype="multipart/form-data" id="form-office">
                            <table class="ui single line table mobile-layout" style="width: 100%" id="numbers" data-playlist-id="1">
                                <thead>
                                <tr>
                                    <th style="width: 1px;" class="text-center">
                                        <div class="ui checkbox" data-tooltip="Select All" data-inverted="">
                                            <input type="checkbox"  onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                                            <label></label>
                                        </div>
                                    </th>
                                    <th class="left aligned six wide">
                                        <label>Name</label>
                                    </th>
                                    <th class="left aligned six wide">
                                        <label>Description</label>
                                    </th>
                                    <th class="left aligned six wide">
                                        <label>Address</label>
                                    </th>
                                    <th class="center aligned one wide">
                                        <label>Actions</label>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($offices as $office)
                                    <tr>
                                        <td class="text-center">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="selected[]" value="{{ $office->id }}" />
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ui header">
                                                <div class="content">
                                                    {{ $office->name }}
                                                    <div class="sub header">{{ $office->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $office->address }}</td>
                                        <td>
                                            <a data-tooltip="Edit" data-inverted="" href="{{route('account.office.edit', ['id'=>$office->id])}}" class="ui icon button"><i class="icon pencil"></i></a>
                                            <button data-tooltip="Delete" data-inverted="" type="button"  onclick="confirm('Are you sure?') ? $('#form-office').attr('action', '{{route('account.office.delete', ['selected[]'=>$office->id])}}' ).submit() : false;" class="ui icon button"><i class="icon trash alternate"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="center aligned">
                                        <td colspan="5">
                                            No Results Found
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
