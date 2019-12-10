
@extends('home.services.layout')

@section('content')

<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}} ">
    <div  class="row d-flex justify-content-center" style="min-height:250px;min-width:100%;margin-top:-20px">

                <div class="col-md-6 text-light py-5">

                        <p>
                            {!!$serviceCategory->description!!}
                        </p>
                        <h3>{{$serviceCategory->title}}</h3>


                </div>

    </div>
</div>

    <div class="my-4"></div>


        <div class="row d-flex justify-content-space container-fluid">

            <div class="col-xl-12">
                @if (! $services->count())
                    <div class="alert alert-warning">
                        <p>Nothing Found</p>
                    </div>
                @else

                <div class="row d-flex justify-content-space">

                    <div class="row">
                        <div class="d-none">
                                {{$alt_class=$services->count()}}
                        </div>
                        @foreach ($services as $service)
                            @if ($service->serviceCategory->title == $serviceCategory->title  )


                                    <div class="row d-flex justify-content-center">

                                        <div class="col-md-7 bg-dark p-5 my-1 post-life {{$alt_class%2==0?'mr-auto':'ml-auto'}}">
                                            <h4><a class="text-primary" style="text-decoration:none;" href="{{ route('projects.show', $service->slug) }}">{!!Str::words($service->title,5)!!}</a></h4>
                                            <p class="intro">{!!$service->body_html!!}</p>
                                        </div>
                                    </div>

                                    <div class="d-none">
                                        {{$alt_class-=1}}
                                    </div>
                            @endif

                        @endforeach
                    </div>


                </div>
                @endif


                <nav class="row justify-content-center">
                  {{ $services->appends( Request::query() )->render() }}
                </nav>
            </div>


        </div>


@endsection
