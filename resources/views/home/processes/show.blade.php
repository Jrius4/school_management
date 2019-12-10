
@extends('home.processes.layout')

@section('content')




<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}}">
    <div style="min-height:250px;min-width:100%;margin-top:-20px" class="bg-transparent">
            <img src="" alt="">
            <div class="row d-flex justify-content-center">
                    <div class=" col-md-6 text-light text-center py-5">
                            <h3>{{$process->title}}</h3>

                        <h3></h3>
                    </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div style="margin-top:-20px" class="bg-light p-3 card">
            <h3>{{$process->title}}</h3>
            <p class='text-justify'>
            {!!$process->body!!}
            </p>
            @if ($process->slug=='delivery')
            <div class="row d-flex justify-content-center">
                <img class="img-fluid img-smallify" src="{{asset('/images/processes/delivery.png')}}" alt="" srcset="">
            </div>
            @elseif($process->slug=='discovery')
            <div class="row d-flex justify-content-center">
                <img class="img-fluid img-smallify" src="{{asset('/images/processes/discovery.png')}}" alt="" srcset="">
            </div>
            @elseif($process->slug=='development')
            <div class="row d-flex justify-content-center">
                <img class="img-fluid img-smallify" src="{{asset('/images/processes/development.png')}}" alt="" srcset="">
            </div>
            @endif

        </div>

    </div>








@endsection
