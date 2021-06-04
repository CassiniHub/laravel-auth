@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>
            Pilot's details:
        </h1>
        <h2>
            Name: {{ $pilot -> firstname }} {{ $pilot -> lastname }}
        </h2>
        <h2>
            Nationality: {{ $pilot -> country }}
        </h2>
        <h2>
            Date of birth: {{ $pilot -> date_of_birth }}
        </h2>

        <ul>
            @foreach ($pilot -> cars as $car)
                <li>
                    Brand: {{ $car -> brand -> name }} <br>
                    Name: {{ $car -> name }} <br>
                    Model: {{ $car -> model }} <br>
                    KW: {{ $car -> kw }}
                </li>
            @endforeach
        </ul>
    </main>
@endsection