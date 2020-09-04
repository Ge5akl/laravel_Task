	@for($d = 0; $d < count($commentdd); $d++ )
                        @if(!is_null($commentdd[$d]['parent_id']))
                            @for($c = 0; $c < count($commentdd[$d]['parent']); $c++)
                                   <div class="card-header">{{ __('Пишет') }} {{ $commentdd[$d]['parent'][$c]['User_id']}}</div>
                                    <div class="card-body">{{ $commentdd[$d]['parent'][$c]['Body'] }}</div>
                            @endfor
                               <div class="card-header">{{ __('Коментарий от') }} {{ $commentdd[$d]['user'][0]['name']}}</div>
                       <div class="card-body">{{ $commentdd[$d]['Body'] }}</div>
                       <div class="form-group">
                             <a href="home/dellCommet/{{$commentdd[$d]['id']}}"><button type="submit" class="btn btn-primary">Удалить</button></a>
                        </div>
                          @else
                         <div class="card-header">{{ __('Коментарий от') }} {{ $commentdd[$d]['user'][0]['name']}}</div>
                       <div class="card-body">{{ $commentdd[$d]['Body'] }}</div>
                       <div class="form-group">
                             <a href="home/dellCommet/{{$commentdd[$d]['id']}}"><button type="submit" class="btn btn-primary">Удалить</button></a>
                        </div>
                        <div class="form-group">
                            <a href="home/creteComments/{{$commentdd[$d]['Object_id']}}/{{$commentdd[$d]['id']}}"><button type="submit" class="btn btn-primary">Ответить</button></a>
                        </div>
                        @endif
                      @endfor
                      <button class="roll" id="btn">Кнопка</button>
                      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
                      <script type="text/javascript">

  $(document).ready(function() {
  $('#btn').on('click', function(){
    $.ajax({
      method: "GET",
      url: "/home/comments/com",
      dataType: "json",
      data: {
      },
      success: function(data) {
              $('#mainModalBody').html(data);
              },
      error: function(er) {
        console.log(er);
      }
    });
  })
});
</script>