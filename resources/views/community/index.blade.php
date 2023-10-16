@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Left colum to show all the links in the DB --}}
            <div class="col-md-8">
                <h1><a href="/community">Community</a> - {{ $channel ? $channel->title : '' }}</h1>
                @foreach ($links as $link)
                    <li class="bg-body">
                        <a class="text-decoration-none label label-default p-1 border-rounded text-black rounded"
                            href="/community/{{ $link->channel->slug }}"
                            style="background-color:{{ $link->channel->color }}">{{ $link->channel->title }}</a>
                        <a href="{{ $link->link }}" target="_blank">
                            {{ $link->title }}
                        </a>
                        <small>Contributed by: {{ $link->creator->name }} {{ $link->updated_at->diffForHumans() }}</small>
                    </li>
                @endforeach
                @if (count($links) == 0)
                    <p>No approved links yet</p>
                @endif
            </div>
            {{-- Right colum to show the form to upload a link --}}
            <div class="col-md-4">
                @include('add-link')
            </div>
        </div>
        {{ $links->links() }}

    </div>
@stop
