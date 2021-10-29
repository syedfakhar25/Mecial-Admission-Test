@component('mail::message')
# Sorry!!

We can not proceed with your application.

Better luck next time

@component('mail::button', ['url' => ''])

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
