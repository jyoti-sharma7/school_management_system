@component('mail::message')
Hello {{$user->name}},
<p>Forgot password? don't worry</p>
@component('mail::button',['url'=>url('reset',$user->remember_token)])
Reset your password 
@endcomponent
<p>In case you have any issues recovering your password, We are here to help</p>
Thanks, <br/>
{{ config('app.name') }}
@endcomponent