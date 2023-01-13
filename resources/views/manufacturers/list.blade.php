@extends('layout')
@section('content')
    <h1>{{ $title }}</h1>
    @if (count($items) > 0)
    <table class="table table-striped table-hover table-sm">
    <thead class="thead-light">
    <tr>
    <th>ID</td>
    <th>Marka</td>
    <th>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $manufacturers)
    <tr>
    <td>{{ $manufacturers->id }}</td>
    <td>{{ $manufacturers->name }}</td>
    <td><a href="/manufacturers/update/{{ $manufacturers->id }}" class="btn btn-outline-primary btnsm">Labot</a> / <form action="/manufacturers/delete/{{ $manufacturers->id }}" method="post" class="deletionform d-inline">
 @csrf
 <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
</form>
</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    @else
    <p>Nav atrasts neviens ieraksts</p>
    @endif
    <a href="/manufacturers/create" class="btn btn-primary">Pievienot ierakstu</a>
@endsection
