@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
 <table class="table table-sm table-hover table-striped">
 <thead class="thead-light">
 <tr>
 <th>ID</th>
 <th>Nosaukums</th>
 <th>Ražotājs</th>
 <th>Gads</th>
 <th>Cena</th>
 <th>Attēlot</th>
 <th>&nbsp;</th>
 </tr>
 </thead>
 <tbody>
 @foreach($items as $car_models)
 <tr>
 <td>{{ $car_models->id }}</td>
 <td>{{ $car_models->name }}</td>
 <td>{{ $car_models->manufacturers->name }}</td>
 <td>{{ $car_models->year }}</td>
 <td>&euro; {{ number_format($car_models->price, 2, '.') }}</td>
 <td>{!! $car_models->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
27 / 55
K. Immers, VeA, 2023-01
 <td>
 <a
 href="/car_models/update/{{ $car_models->id }}"
 class="btn btn-outline-primary btn-sm"
 >Labot</a> /
 <form
 method="post"
 action="/car_models/delete/{{ $car_models->id }}"
 class="d-inline deletion-form"
 >
 @csrf
<button
 type="submit"
 class="btn btn-outline-danger btn-sm"
 >Dzēst</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
@else
 <p>Nav atrasts neviens ieraksts</p>
@endif
<a href="/car_models/create" class="btn btn-primary">Pievienot ierakstu</a>
@endsection