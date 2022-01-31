@component('mail::message')
# {{ $object->title }} was created

Thanks for create post on our app.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
