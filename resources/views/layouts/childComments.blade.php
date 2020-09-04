   <div class="card-header">{{$user->name}} {{ __('Пишет:') }} </div>
                                <div class="card-body">  {{ $user->Body }}</div>
<div class="card-header">{{ __('Коментарий от') }} {{$user->name}} 
                     </div>
                      <div class="card-body"> 
                          {{ $user->child_body}}
                          <div class="form-group">
                            <a href="home/dellCommet/{{$user->id}}"><button type="submit" class="btn btn-primary col-md 6">Удалить</button></a>
                        </div>
                      </div>