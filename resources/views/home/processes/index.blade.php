
@extends('home.processes.layout')

@section('content')



<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}}">
    <div style="min-height:250px;min-width:100%;margin-top:-20px" class="bg-transparent">
        <img src="" alt="">
        <div class="row d-flex justify-content-center">
                <div class=" col-md-6 text-light align-self-center py-5">
                        <h3>Processes</h3>
                </div>
        </div>
    </div>
</div>





<header class="my-2 container-fluid">
    <div class="row d-flex justify-content-around  text-center">

        <div class="col-md-8">
            <h2 class="text-primary">Process</h2>
            <p>
              We create engagement between your brand and real people by blending creativity with technology. Experience as they should be: <br>
              <strong>bold, beautiful and immersive.</strong>
            </p>
        </div>

        <div class="row d-flex justify-content-center col-xl-12">
            <div class="col-sm-3">
            <img src="{{asset('img/icons/strategy.svg')}}" alt="imge not found" width="100px" height="100px" id="img-fluid">
            <h5 class="mt-2">STRATEGY</h5>
            </div>

            <div class="col-sm-3">
            <img src="{{asset('img/icons/sketch.svg')}}" alt="imge not found" width="100px" height="100px" id="img-fluid">
            <h5 class="mt-2">DESIGN</h5>
            </div>

            <div class="col-sm-3">
            <img src="{{asset('img/icons/computer.svg')}}" alt="imge not found" width="100px" height="100px" id="img-fluid">
            <h5 class="mt-2">Development</h5>
            </div>
        </div>

    </div>

   </header>





<div class="image-box">
        <div
          class="image-box__background"
          style="--image-url: url({{asset('/assets/images/black-flat-screen-computer-monitor-1714208.jpg')}})"
        ></div>
        <div class="image-box__overlay"></div>
        <div class="image-box__content">
                <div class="container  text-center justify-content-center">
                        <div class="mb-2">
                                <h2 class="section-heading ">Creating digital experiences</h2>
                        </div>
                          <p>In an increasingly automated and distant world, we believe in the human touch. Human experience is at the center of everything we design. We believe in experts, not generalists. Our teams is handpicked for what they do best and nurtured into poineers. We believe in the simplicity of design. When the design is clear so is the message. We give you the tools for effect communication</p>


                          <p>We build experience that engages. <br> People are the core of our business ,how they use  and interact with our product is measure of our success.We put them at the heart of everything we do </p>


                </div>
        </div>
      </div>


   <div class="container-fluid text-center mb-0">
        <div>
            <h2>How we work</h2>
                <p>We approach every project  with our collabrative  and iterative process that is simple ,but effective</p>
        </div>

     <div class="row justify-content-around">

        @foreach ($processes as $process)


        <div class="col-md-4 process p-2 mb-2">
            <h2>{{$process->title}}</h2>
            <p class="text-center">{!!$process->excerpt!!}</p>
            @if ($process->title=='DISCOVERY')
                <a href="{{route('processes.show',$process->slug)}}" class="btn btn-warning btn-unique ">Learn More</a>
            @elseif($process->title=='DEVELOPMENT')
                <a href="{{route('processes.show',$process->slug)}}" class="btn btn-primary btn-unique ">Learn More</a>
            @elseif($process->title=='DELIVERY')
                <a href="{{route('processes.show',$process->slug)}}" class="btn btn-success btn-unique ">Learn More</a>
            @else
                <a href="{{route('processes.show',$process->slug)}}" class="btn btn-primary btn-unique ">Learn More</a>
            @endif

        </div>


        @endforeach


     </div>



 </div>






@endsection
