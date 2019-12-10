@extends('home.careers.layout')

@section('content')

<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}} ">
    <div  class="row d-flex justify-content-center" style="min-height:250px;min-width:100%;margin-top:-20px">

                <div class="col-md-6 text-light py-5">

                    <p>
                        We embrass all backgrounds and Cultures
                    </p>
                <h3>Career</h3>
                </div>

    </div>
</div>
{{--
<div class="container my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-uppercase">
            <a href="{{url('/')}}" class="text-primary">Home</a>
        </li>
        <li class="breadcrumb-item active text-uppercase">
            <a href="{{url('/careers')}}" class="text-primary">Careers</a>
        </li>
    </ol>
</div> --}}


<div class="row container-fluid justify-content-center">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">


        @foreach ($categories as $category)

            @if ($category->careers->count()>0)

            <li class="nav-item">
                <a class="nav-link" id="pills-{{$category->slug}}-tab" data-toggle="pill" href="#pills-{{$category->slug}}" role="tab" aria-controls="pills-{{$category->slug}}" aria-selected="true">{{$category->title}}</a>
            </li>

            @endif

        @endforeach
    </ul>
</div>

<div class="tab-content container" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-{{$careers->first()->careerCategory->slug}}" role="tabpanel" aria-labelledby="pills-{{$careers->first()->careerCategory->slug}}-tab">
        <div class="my-2">
            <h2>{{$careers->first()->careerCategory->title}}</h2>
        </div>
        @foreach ($careers as $career)

            @if ($career->careerCategory->slug == $careers->first()->careerCategory->slug)



                <div class="row d-flex justify-content-start mb-2">
                    @if ($career->image)
                        <div class="col-md-4 image figure">
                            <a style="text-decoration:none" href="{{route('careers.show',$career->slug)}}#single-content">
                                <img src="{{ $career->image_url }}" alt="{{$career->slug}}" class="figure-img img-fluid rounded"/>
                            </a>
                        </div>
                    @endif


                    <div class="col-sm-6 ">
                        <h5>{{$career->title}}</h5>
                        <p>
                            {!!Str::words($career->excerpt,15)!!}
                        </p>
                        <p>Already have an Orange MyTunes Music Gift Card?</p>
                        <a href="{{route('careers.show',$career->slug)}}#single-content" class="btn btn-primary btn-unique ">Apply Now</a>
                    </div>


                </div>

            @endif
        @endforeach
    </div>

    @foreach ($categories as $category)

        <div class="tab-pane fade" id="pills-{{$category->slug}}" role="tabpanel" aria-labelledby="pills-{{$category->slug}}-tab">
            <div class="my-2">
                <h2>{{$category->title}}</h2>
            </div>

            @foreach ($careers as $career)

                @if ($career->careerCategory->slug == $category->slug)

                    <div class="row d-flex justify-content-start">
                        @if ($career->image)
                            <div class="col-md-4 image figure"><a style="text-decoration:none" href="{{route('careers.show',$career->slug)}}#single-content"><img src="{{ $career->image_url }}"
                                alt="{{$career->slug}}" class="figure-img img-fluid rounded"></a>
                            </div>
                        @endif


                        <div class="col-sm-6 ">
                                <h5>{{$career->title}}</h5>
                                <p>
                                    {!!Str::words($career->excerpt,15)!!}
                                </p>
                                <p>Already have an Orange MyTunes Music Gift Card?</p>
                                <a href="{{route('careers.show',$career->slug)}}#single-content" class="btn btn-primary btn-unique ">Apply Now</a>
                        </div>


                    </div>

                @endif

            @endforeach
        </div>

    @endforeach


</div>


@endsection

