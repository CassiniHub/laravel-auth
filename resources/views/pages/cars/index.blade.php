@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>
            Cars:
        </h1>

        <ul>
            @foreach ($cars as $car)
                <li>
                    <h2>
                        {{ $car -> name }} -> {{ $car -> brand -> name }}
                        <form action="{{ route('cars.destroy', $car -> id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button>&#10060;</button>
                        </form>
                        <a href="{{ route('cars.edit', $car -> id) }}">
                            &#9997;
                        </a>
                    </h2>
                    <ul>
                        @foreach ($car -> pilots as $pilot)
                            <li>
                                <a href="{{ route('pilots.show', $pilot -> id) }}">
                                    {{ $pilot -> firstname }} {{ $pilot -> lastname }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </main>
@endsection