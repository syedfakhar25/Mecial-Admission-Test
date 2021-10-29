@component('mail::message')
# Congratulations!!
You have been selected by Joint Admission Committee AJ&K.


@component('mail::button', ['url' => ''])
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
