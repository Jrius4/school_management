
@extends('home.projects.layout')

@section('content')
<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}}">
    <div style="min-height:250px;min-width:100%;margin-top:-20px" class="bg-transparent">
            <img src="" alt="">
            <div class="row d-flex text-center justify-content-center">
                    <div class=" col-md-6 text-light py-5">
                            <h3 class="m-auto">Projects</h3>


                    </div>
            </div>
        </div>
    </div>
    {{-- <div class="container my-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-uppercase"> <a href="{{url('/')}}" class="text-primary">Home</a></li>
          <li class="breadcrumb-item active text-uppercase"><a href="{{url('/projects')}}" class="text-primary">Projects</a></li>
        </ol>
    </div> --}}
    <div class="container">

        <div class="row d-flex justify-content-space">

            <div class="col-md-12">
                @if (! $projects->count())
                    <div class="alert alert-warning">
                        <p>Nothing Found</p>
                    </div>
                @else

                <div class="row d-flex justify-content-space">

                    <div class="row">
                            <div class="d-none">
                                    {{$alt_class=$projects->count()}}
                            </div>
                        @foreach ($projects as $project)

                                @if ($alt_class%2==0)

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="post-item row d-flex justify-content-start">
                                                @if ($project->image)
                                                    <div class="image figure col-md-6"><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}"><img src="{{ $project->image_url }}"
                                                            alt="" class="figure-img img-fluid rounded"></a>
                                                    </div>
                                                @else
                                                    <div class="image figure col-md-6 bg-dark h-auto w-100 rounded" style="min-height:250px" ><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}"><img src=""
                                                        alt="" class="figure-img img-fluid rounded"></a>
                                                    </div>
                                                @endif

                                            <div class="col-md-6 mr-auto">
                                                <h4><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}">{!!Str::words($project->title,5)!!}</a></h4>
                                                <p class="intro">{!!Str::words($project->excerpt_html,15)!!}</p>
                                                <p class="read-more"><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}" class="btn btn-unique-outline btn-md btn-sm">Continue reading</a></p>
                                            </div>
                                            </div>
                                        </div>

                                @else

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="post-item row d-flex justify-content-start">


                                        <div class="col-md-6 ml-auto">
                                            <h4><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}">{!!Str::words($project->title,5)!!}</a></h4>
                                            <p class="intro">{!!Str::words($project->excerpt_html,15)!!}</p>
                                            <p class="read-more"><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}" class="btn btn-unique-outline btn-md btn-sm">Continue reading</a></p>
                                        </div>
                                        @if ($project->image)
                                                <div class="image figure col-md-6"><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}"><img src="{{ $project->image_url }}"
                                                        alt="" class="figure-img img-fluid rounded"></a>
                                                </div>
                                            @else
                                                <div class="image figure col-md-6 bg-dark h-auto w-100 rounded" style="min-height:250px" ><a style="text-decoration:none" href="{{ route('projects.show', $project->slug) }}"><img src=""
                                                    alt="" class="figure-img img-fluid rounded"></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                @endif

                                <div class="d-none">
                                    {{$alt_class-=1}}
                                </div>
                            {{-- @endif --}}
                        @endforeach
                    </div>


                </div>
                @endif


                <nav class="row justify-content-center">
                  {{ $projects->appends( Request::query() )->render() }}
                </nav>
            </div>


        </div>
    </div>



@endsection
