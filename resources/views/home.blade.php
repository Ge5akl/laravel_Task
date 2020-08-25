@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Коммантарий') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы можете оставить комментрий ниже!') }} 

                    <form>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Ваш комментрий">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
