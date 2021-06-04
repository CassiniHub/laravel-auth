@extends('layouts.main-layout')

@section('content')
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        @method('POST')
        
        <label for="name">Name</label>
        <div>
            <input id="name" name="name" type="text" required>
        </div>

        <label for="model">Model</label>
        <div>
            <input id="model" name="model" type="text" required>
        </div>

        <label for="kw">KW</label>
        <div>
            <input id="kw" name="kw" type="number" min="200" max="2000" required>
        </div>
        <label for="pilots_id[]">Pilots</label>
        <div>
            <select id="pilots_id[]" name="pilots_id[]" required multiple>
                <option selected disabled>Pilots</option>
                @foreach ($pilots as $pilot)
                    <option value="{{ $pilot -> id }}">
                        {{ $pilot -> firstname }}
                        {{ $pilot -> lastname }}
                    </option>
                @endforeach
            </select>
        </div>
        <label for="brand_id">Brands</label>
        <div>
            <select id="brand_id" name="brand_id" required>
                <option selected disabled>Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand -> id }}">{{ $brand -> name }} ({{ $brand -> nationality }})</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Crea!">
    </form>

@endsection