@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Оставить комментарий') }}</div>
                <div class="card-body">
                     @auth
                    <form method="post" action="{{action('HomeController@create')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Комментарий</label>
                            <textarea type="text" name="CommentBody" class="form-control" aria-describedby="emailHelp" placeholder="Комментарий" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                     @endauth
                     @forelse ($commetns as $commetn)
                     <div class="card-header">{{ __('Коментарий от') }} </div>
                      <div class="card-body">
                          {{ $commetn->Body }}
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md 6">Удалить</button>
                        </div>
                         <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md 6">Показать комментарий</button>
                        </div>
                      </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>  
                    @endif
                    @empty
                <p>Нет комментариев</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
