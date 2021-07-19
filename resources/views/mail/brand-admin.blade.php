@component('mail::message')
# Request New Brand

A new brand has requested to join is name {{ $data->brand_name }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
