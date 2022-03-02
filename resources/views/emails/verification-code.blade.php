@component('mail::message')
# Account Verification

## Hi {{ $fullname }}
Thank you for registering to our Application, it is a pleasure to assist you on your needs.

To complete your account registration you need to input the OTP below to the application.

@component('mail::panel')
{{ $code }}
====================
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
