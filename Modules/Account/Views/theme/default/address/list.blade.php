@extends('account::theme.default.layouts.master')

@section('title') Address List @endsection

@section('content')
    <div class="ui bottom attached segment active">
        <div class="ui styled">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header">Address List</h4>
                    </div>
{{--                    <div class="ui icon button" data-tooltip="Add users to your feed" data-inverted="">--}}
{{--                        <i class="add icon"></i>--}}
{{--                    </div>--}}
                        <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                            <a href="{{route('account.address.add')}}" class="ui primary icon button" data-tooltip="Add new" data-inverted="" >
                                <i class="icon plus"></i>
                            </a>
                        </div>
                        <div class="item" style="padding: 0;margin: 10px 5px 20px 0">
                            <button class="ui negative icon button" type="button" onclick="confirm('Are you sure?') ? $('#form-address').submit() : false;" data-tooltip="Delete" data-inverted="">
                                <i class="icon trash alternate"></i>
                            </button>
                        </div>
                </div>
            </div>

            <div class="content active">
                <form action="{{ route('account.address.delete') }}" method="post" enctype="multipart/form-data" id="form-address">
                <table class="ui table">
                    <thead>
                    <tr>
                        <th style="width: 1px;" class="text-center">
                            <div class="ui checkbox" data-tooltip="Select All" data-inverted="">
                            <input type="checkbox"  onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" />
                                <label></label>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Name</label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Country</label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Address</label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Validated</label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Verified</label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="ui form">
                                <div class="inline field">
                                    <label>Actions</label>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($addresses as $address)
                    <tr role="row">
                        <td class="text-center">
                            <div class="ui checkbox">
                                <input type="checkbox" name="selected[]" value="{{ $address->id }}" />
                                <label></label>
                            </div>
                        </td>
                        <td>{{ $address->name }}</td>
                        <td>{{ $address->country_id }}</td>
                        <td>{{ $address->address_1 }} {{ $address->address_2 }}</td>
                        @if($address->validated)
                            <td class="positive"> <i class="icon checkmark"></i> Validated </td>
                            @else
                            <td class="negative"> No </td>
                        @endif
                        @if($address->verified)
                            <td class="positive"> <i class="icon checkmark"></i> Verified </td>
                        @else
                            <td class="negative"> No </td>
                        @endif
                        <td>
                            <a data-tooltip="Edit" data-inverted="" href="{{route('account.address.edit', ['id'=>$address->id])}}" class="ui icon button"><i class="icon pencil"></i></a>
                            <button data-tooltip="Delete" data-inverted="" type="button"  onclick="confirm('Are you sure?') ? $('#form-address').attr('action', '{{route('account.address.delete', ['selected[]'=>$address->id])}}' ).submit() : false;" class="ui icon button"><i class="icon trash alternate"></i></button>
                        </td>
                    </tr>
                    @empty
                        <tr class="center aligned">
                        <td colspan="7">
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
@endsection
