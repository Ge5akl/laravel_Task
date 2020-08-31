@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Список ваших комментариев') }}</div>
                <div class="card-body">
                 
                     @forelse ($comments as $comment)
                     <div class="card-header">{{ __('Коментарий') }}</div>
                      <div class="card-body">
                          {{ $comment->Body }}
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