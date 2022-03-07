@component('mail::message')
# A wonderful day to you!

<strong>{{ $Sender_Name }}</strong>({{ $Owner_Email }}) has registered you to Hanap-Bahay App as a Tenant, Please click the button below to continue your Registration. 

Please disregard this email if you think you are receiving this email by mistake.

@component('mail::button', ['url' => env('FRONTEND_HOST')])
Continue Registration
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
