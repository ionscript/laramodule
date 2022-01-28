@extends('admin::theme.default.layouts.master')

@section('title') Agent Group List @endsection

@section('content')
    <div class="ui bottom groups attached segment" id="seconde" style="border: none">
        <p>Groups are a great way to organize your Front Office users. They consist of three sections:</p>
        <div class="ui message">
            <p><span>Group Users:</span> these are the users (extensions) that belong to this group</p>
            <p><span>Toll Restriction:</span> the dial plans that users of this group are able to use</p>
            <p><span>User Permissions:</span> the permissions that users of this group have inside of Front Office and Buddy</p>
            <p><span>Group Permissions: </span> the permissions that users of this group have over users in other groups</p>
        </div>
        <div class="ui styled accordion">
            <div class="title">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header"><i class="fas fa-plus-square"></i>Showing 0 Departments</h4>
                    </div>
                </div>
            </div>
            <div class="content">
                <p>No Departments exists!</p>
            </div>
        </div>
        <div class="ui styled accordion active">
            <div class="title active">
                <div class="ui top attached menu">
                    <div class="left menu">
                        <h4 class="ui header"><i class="fas fa-plus-square"></i>Showing 7 Groups</h4>
                    </div>
                </div>
            </div>
            <div class="content active">
                <table class="ui single group-info line table unstackable" id="groupsTable" data-page-length="40"
                       data-ajax-url="{{route('admin.group.viewAjax')}}" style="width: 100%">
                    <thead>
                    <tr>
                        <th class="left aligned collapsing">
                            <label>Name</label>
                        </th>
                        <th class="left aligned collapsing three wide">
                            <div class="ui number form">
                                <div class="inline field">
                                    <label>Extension</label>
                                </div>
                            </div>
                        </th>
                        <th class="left aligned three wide">
                            <label>Users</label>
                        </th>
                        <th class="left aligned five wide">
                            <label>Permissions</label>
                        </th>
                        <th class="center aligned one wide">
                            <label>View</label>
                        </th>
                        <th class="center aligned one wide">
                            <label>Delete</label>
                        </th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>
        <div class="ui styled" style="text-align: center;">
            <a class="ui button" href="{{route('admin.group.view')}}" style="background-color: #fd5173; color: #fff; border-radius: 0; font-size: 18px;">Create Group</a>
        </div>
    </div>
@endsection
