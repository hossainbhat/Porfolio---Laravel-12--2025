<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
    @isset($html_tag_data)
    @foreach ($html_tag_data as $key => $value)
    data-{{ $key }}='{{ $value }}'
    @endforeach
@endisset>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }} | {{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    @include('layouts.them._layout.header')
</head>
@yield('content')

</html>
