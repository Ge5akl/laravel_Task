@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Оставить комментарий') }}</div>
                <div class="card-body">
                    <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Комментарий</label>
                            <textarea type="text" name="DicsName" class="form-control" aria-describedby="emailHelp" placeholder="Введите название диска" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                     @forelse ($commetns as $commetn)
                    <div class="card">
                     <div class="card-header">{{ __('Коментарий ') }}  </div>
                      <div class="card-body">
                          {{ $commetn->Body }}
                      </div>
                    @empty
                <p>Нет комментариев</p>
                @endforelse
                       @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
