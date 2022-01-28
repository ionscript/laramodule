@extends('admin::theme.default.layouts.master')

@section('title') Agent Group Form @endsection

@section('content')
    <h2 class="ui header"> {{isset($group) ? 'Update' :  'Create'}} group</h2>

    <form class="ui form" method="POST" action="{{ route('admin.group.add') }}">
        @csrf
        <div class="field {{ $errors->has('name') ? ' error' : ''}}">
            <label>{{ __("First name") }}</label>
            <input id="name" type="text" name="name" value="{{ $group->name or old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <div class="ui error message" style="display: block; margin-bottom: 1em">
                    <p>{{ $errors->first('name') }}</p>
                </div>
            @endif
        </div>

        <div class="field">
            <div class="ui toggle checkbox">
                <input type="checkbox" name="auto_add" class="hidden" {{ isset($group->auto_add) ? 'checked' : '' }}>
                <label>{{ __('Auto-add New Users') }}</label>
            </div>
        </div>

        <div class="field">
            <div class="ui toggle checkbox">
                <input type="checkbox" name="department" class="hidden" {{ isset($group->is_department) ? 'checked' : '' }}>
                <label>{{ __('Department') }}</label>
            </div>
        </div>

        <div class="field">
            <label>Users</label>
            <select multiple id="users" name="users[]" class="ui dropdown">
                @foreach($agents as $agent)
                    <option value="{{$agent->id}}" {{ (isset($agent->group_id) && $agent->group_id == $group->id) ? 'selected' : '' }}>{{$agent->first_name}} {{$agent->last_name}}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="id" value="{{ isset($group->id) ? $group->id :  ''}}">
        <button class="ui button" type="submit">{{ isset($group) ? 'Update' :  'Create'}}</button>
    </form>
    @push('scripts')
        <script>
            $('.ui.checkbox')
                .checkbox()
            ;
        </script>
    @endpush
@endsection
