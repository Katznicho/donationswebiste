<x-mail::message>

Hello {{$name}}, your account with {{ config('app.name') }} has been successfully created.

Welcome to the family.

You can use {{$password }} to login into your account.

<x-mail::button :url="$url">
  Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
