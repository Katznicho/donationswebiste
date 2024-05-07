<x-mail::message>
Hello {{$name}}, your payment of {{$amount}} is {{$status}}

Please login to keep track of your payments.

<x-mail::button :url="$url">
  Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
