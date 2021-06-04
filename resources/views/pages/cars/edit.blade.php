@extends('layouts.main-layout')

@section('content')
    <form action="{{ route('cars.update', $car -> id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Name</label>
        <div>
            <input id="name" name="name" type="text" value="{{ $car -> name }}" required>
        </div>

        <label for="model">Model</label>
        <div>
            <input id="model" name="model" type="text" value="{{ $car -> model }}" required>
        </div>

        <label for="kw">KW</label>
        <div>
            <input id="kw" name="kw" type="number" min="200" max="2000" value="{{ $car -> kw }}" required>
        </div>

        <label for="pilots_id[]">Pilots</label>
        <div>
            <select id="pilots_id[]" name="pilots_id[]" required multiple>
                @foreach ($pilots as $pilot)
                    <option value="{{ $pilot -> id }}"
                        
                        @foreach ($car -> pilots as $carPilot)
                            @if ($carPilot -> id == $pilot -> id)
                                selected
                            @endif
                        @endforeach
                    >
                        {{ $pilot -> firstname }}
                        {{ $pilot -> lastname }}
                    </option>
                @endforeach
            </select>
        </div>

        <label for="brand_id">Brands</label>
        <div>
            <select id="brand_id" name="brand_id" required>
                @foreach ($brands as $brand)
                    <option value="{{ $brand -> id }}"
                    
                        @if ($car -> brand -> id == $brand -> id)
                            selected
                        @endif
                        
                    >{{ $brand -> name }} ({{ $brand -> nationality }})</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Crea!">
    </form>

@endsection