@extends('layouts.home')
@section('content')
<div class="title">{{ $data['name'] }} {{ $name }}</div>
<div>
    @foreach($data as $key =>$value)
        {{$key}}{{$value}}
        @if($name)
            及格
        @else
            不及格
        @endif
    @endforeach
</div>
@endsection
