@foreach ($dealsDB as $deal)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading @if($k%2==0) red @else blue @endif">
                    <h4><i class="fa fa-fw fa-gift"></i>{{ $deal->title }}</h4>
                </div>
                <div class="panel-body">
                    <p>{{  $deal->content }}</p>
                </div>
            </div>
        </div>
   $k++;
@endforeach 
