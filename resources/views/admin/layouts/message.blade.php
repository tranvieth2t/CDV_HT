@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-error">
        {{ session()->get('error') }}
    </div>
@endif

<div class="alert alert-success" role="alert" id="alertMessage" style="display: none"></div>
<script>
    var timshow = '{{config('constants.time_show_message')}}';
    var timehide = '{{config('constants.time_hide_message')}}';

    setTimeout(function () {
        $('.alert-success').hide(timehide);
    }, timshow)

    setTimeout(function () {
        $('.alert-danger').hide(timehide);
    }, timshow)
</script>
