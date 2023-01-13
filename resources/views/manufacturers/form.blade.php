@extends('layout')
@section('content')
    <h1>{{ $title }}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
    @endif
    <form method="post" action="{{ $manufacturers->exists ? '/manufacturers/patch/' . $manufacturers->id : '/manufacturers/put' }}"
    @csrf
    <div class="mb-3">
    <label for="manufacturers-name" class="form-label">Ražotāja nosaukums</label>
    <input
    value="{{ old('name', $manufacturers->name) }}"
    type="text"
    class="form-control @error('name') is-invalid @enderror"
    id="manufacturers-name"
    name="name">
    @error('name')
    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Pievienot</button>
    </form>
@endsection