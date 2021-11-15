@component('mail::message')
Dear Applicant,
You have been selected by Joint Admission Committee AJ&K.


@component('mail::button', ['url' => 'https://mcadmissions.ajk.gov.pk'])
    Visit Website to check status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
