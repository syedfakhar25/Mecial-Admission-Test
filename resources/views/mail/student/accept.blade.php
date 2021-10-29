@component('mail::message')
# Congratulations!!
You have been selected by Joint Admission Committee AJ&K.


@component('mail::button', ['url' => 'https://mcadmissions.ajk.gov.pk/forgot-password'])
    Visit Website to check status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
