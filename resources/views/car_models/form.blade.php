@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
 <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
@endif
<form
 method="post"
 action="{{ $car_models->exists ? '/car_models/patch/' . $car_models->id : '/car_models/put' }}"
 enctype="multipart/form-data"
 >
 @csrf
 <div class="mb-3">
 <label for="car_models-name" class="form-label">Nosaukums</label>
 <input
 type="text"
 id="car_models-name"
 name="name"
 value="{{ old('name', $car_models->name) }}"
 class="form-control @error('name') is-invalid @enderror"
 >
 @error('name')
 <p class="invalid-feedback">{{ $errors->first('name') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="carmodel-manufacturer" class="form-label">Ražotājs</label>
 <select
    id="carmodel-manufacturer"
    name="manufacturer_id"
    class="form-select @error('manufacturer_id') is-invalid @enderror"
    >
    <option value="">Norādiet ražotāju!</option>
    @foreach($manufacturers as $manufacturer)
    <option
    value="{{ $manufacturer->id }}"
    @if ($manufacturer->id == old('manufacturers_id', $car_models->manufacturers->id ?? false)) selected @endif
    >{{ $manufacturer->name }}</option>
    @endforeach
 </select>

 @error('manufacturers_id')
 <p class="invalid-feedback">{{ $errors->first('manufacturers_id') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="car_models-description" class="form-label">Apraksts</label>

 <textarea
 id="car_models-description"
 name="description"
 class="form-control @error('description') is-invalid @enderror"
 >{{ old('description', $car_models->description) }}</textarea>
 @error('description')
 <p class="invalid-feedback">{{ $errors->first('description') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="car_models-year" class="form-label">Izlaiduma gads</label>
 <input
 type="number" max="{{ date('Y') + 1 }}" step="1"
 id="car_models-year"
 name="year"
 value="{{ old('year', $car_models->year) }}"
 class="form-control @error('year') is-invalid @enderror"
 >
 @error('year')
 <p class="invalid-feedback">{{ $errors->first('year') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <label for="car_models-price" class="form-label">Cena</label>
 <input
 type="number" min="0.00" step="0.01" lang="en"
 id="car_models-price"
 name="price"
 value="{{ old('price', $car_models->price) }}"
 class="form-control @error('price') is-invalid @enderror"
 >
 @error('price')
 <p class="invalid-feedback">{{ $errors->first('price') }}</p>
 @enderror
 </div>
 <div class="mb-3">
 <div class="form-check">
 <input
 type="checkbox"
 id="car_models-display"
 name="display"
 value="1"
 class="form-check-input @error('display') is-invalid @enderror"
 @if (old('display', $car_models->display)) checked @endif
 >
 <label class="form-check-label" for="car_models-display">
 Publicēt ierakstu
 </label>
 @error('display')
 <p class="invalid-feedback">{{ $errors->first('display') }}</p>
 @enderror
 </div>
 
 <div class="mb-3">
 <label for="car_models-image" class="form-label">Attēls</label>
 @if ($car_models->image)
 <img
 src="{{ asset('images/' . $car_models->image) }}"
 class="img-fluid img-thumbnail d-block mb-2"
 alt="{{ $car_models->name }}"
 >
 @endif
 <input
 type="file" accept="image/png, image/jpeg"
 id="car_models-image"
 name="image"
 class="form-control @error('image') is-invalid @enderror"
 >
 @error('image')
 <p class="invalid-feedback">{{ $errors->first('image') }}</p>
 @enderror
</div>
<button type="submit" class="btn btn-primary">
 {{ $car_models->exists ? 'Atjaunot' : 'Pievienot' }}
 </button>
</form>

@endsection
