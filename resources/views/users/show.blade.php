@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>Стариница  пользователя</p>
            <div class="card">
                <div class="card-header">{{ __('Оставить комментарий') }} </div>
                 <div class="card-body">
                     @auth
                    <form method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Комментарий </label>
                            <textarea type="text" name="CommentBody" class="form-control" aria-describedby="emailHelp" placeholder="Комментарий" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                     @endauth
                 
            @include('users.commentsShow')
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
