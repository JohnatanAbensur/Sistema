@extends('../layouts/app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('main')
  <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
    @for ($i = 1; $i <= 5; $i++)
    <div class="col-md-2">
      <div class="card h-100">
        <img src="{{ asset('image/product03.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Card title</h5>
          <p class="card-text text-justify">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    @endfor
  </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush