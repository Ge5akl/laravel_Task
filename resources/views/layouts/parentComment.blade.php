
<div class="card-header">{{ __('Коментарий от') }} {{$user->name}} 
                     </div>
                      <div class="card-body"> 
                          {{ $user->Body }}
                          <div class="form-group">
                            <a href="home/dellCommet/{{$user->id}}"><button type="submit" class="btn btn-primary col-md 6">Удалить</button></a>
                        </div>
                         <div class="form-group">
                            <a href="home/addAnsw/{{$user->id}}"><button type="submit" class="btn btn-primary col-md 6">Ответить</button></a>
                        </div>
                      </div>