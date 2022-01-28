@extends('account::theme.default.layouts.master')

@section('title') Agent List @endsection

@section('content')
    <div class="ui bottom attached segment" id="app" style="border: none">
        <div>
            <div class="content">
                <div class="ui styled">
                    <div class="title active">
                        <div class="ui top attached menu">
                            <div class="left menu">
                                <h4 class="ui header">Agent List</h4>
                            </div>
                            <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                                <a href="{{route('account.agent.add')}}" class="ui primary icon button" data-tooltip="Add new" data-inverted="" >
                                    <i class="icon plus"></i>
                                </a>
                            </div>
                            <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                                <button class="ui negative icon button" type="button" onclick="confirm('Are you sure?') ? $('#form-agent').submit() : false;" data-tooltip="Delete" data-inverted="">
                                    <i class="icon trash alternate"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content active">
                        <form action="{{ route('account.agent.delete') }}" method="post" enctype="multipart/form-data" id="form-agent">
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
                                        <label>Email</label>
                                    </th>
                                    <th class="center aligned one wide">
                                        <label>Actions</label>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($agents as $agent)
                                    <tr>
                                        <td class="text-center">
                                            <div class="ui checkbox">
                                                <input type="checkbox" name="selected[]" value="{{ $agent->id }}" />
                                                <label></label>
                                            </div>
                                        </td>
                                        <td>{{ $agent->username }}</td>
                                        <td>
                                            <div class="ui header">
                                                <div class="content">
                                                    {{ $agent->firstname }} {{ $agent->lastname }}
                                                    <div class="sub header">{{ $agent->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $agent->email }}</td>
                                        <td>
                                            <a data-tooltip="Edit" data-inverted="" href="{{route('account.agent.edit', ['id'=>$agent->id])}}" class="ui icon button"><i class="icon pencil"></i></a>
                                            <button data-tooltip="Delete" data-inverted="" type="button"  onclick="confirm('Are you sure?') ? $('#form-agent').attr('action', '{{route('account.agent.delete', ['selected[]'=>$agent->id])}}' ).submit() : false;" class="ui icon button"><i class="icon trash alternate"></i></button>
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
