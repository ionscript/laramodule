<div class="sixteen wide mobile four wide tablet four wide computer column sidebar-two mobile hidden">
    <div class="r-sidebar">
        <div class="right-sidebar">
{{--            @if(isset($statistic))--}}
{{--                @include('index.modules.statistic.index')--}}
{{--            @endif--}}

            <br class="mobile hidden">

            <div class="taxinfo mobile hidden">
                <button class="ui button" onclick=" window.open('https://www.taxinfonet.com','_blank')">TaxInfonet</button>
            </div>
            <!-- only for desktop screen -->
            <br class="mobile hidden">
            <!-- only for desktop screen -->
            <div class="taxinfo mobile hidden">
                <button class="ui button" onclick=" window.open('https://ng.versiclock.com','_blank')">VersiClock</button>
            </div>

            <div class="taxinfo mobile hidden">
                <a class="ui button" href="">SMS</a>
            </div>

            <br class="mobile hidden">

{{--            @if(session()->has('admin_id') || Auth::guard('agents')->user()->report_access || isset($statis))--}}
{{--                @include('index.modules.reports.index')--}}
{{--            @endif--}}

            <br class="mobile hidden">

{{--            @include('index.modules.notes.index')--}}
        </div>
    </div>
</div>
