@extends('home.about-us.layout')

@section('content')

<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}} ">
    <div  class="row d-flex justify-content-center" style="min-height:250px;min-width:100%;margin-top:-20px">

                <div class="col-md-6 text-light text-center py-5">

                        <p>
                            We are more than an agency
                        </p>
                        <h3>About Us</h3>

                </div>

    </div>
</div>



<header class="" style="margin-top:-25px">
    <div class="container text-center">


       <div class="row justify-content-around">
         <div class="col-md-5 col-sm-4 py-4 card bg-dark text-light  mb-3">
           <div class="card-body">
                <h4 >Our Vision</h4>
                <p>
                    We are in business to establish trust, build brands and transform business.
               </p>
           </div>
         </div>

         <div class="col-md-5 col-sm-4 py-4 card  bg-dark  text-light  mb-3">
            <div class="card-body">
                <h4 >Our Mission</h4>
                <p>
                    We are on a mission to create life changing innovations that impact individuals and businesses around.
                </p>
            </div>
         </div>


    </div>

</header>


<section class="mt-4">

    <div class="container row d-flex justify-content-center py-4">
        <div class="col d-lg-block d-xl-block d-none">
            <div class="display-1 tilt-section"  style="min-width:150px">
                <h6 class="">Our Culture</h6>
            </div>
        </div>
        <div class="col-md-10 align-self-center">
            <h3>We are committed to the future</h3>
            <p>
                Ndebi tech at our core, we believe that our commitment to the future means constantly
                looking for newer and better ways to solve our clients problems by
                putting our best foot forward through research and data insights.
            </p>
            <p>
                We exist to build the business at our clients, bringing together the best
                services from across all of our different disciplines, and crafting
                business and campaign strategies, that work. As the industry changes,
                we do too, using the creativity, originality and deep research of our
                teams to ignite sales and help companies build enduring brands.
            </p>
        </div>
    </div>

</section>





<div class="image-box">
        <div
          class="image-box__background"
          style="--image-url: url({{asset('/assets/images/black-flat-screen-computer-monitor-1714208.jpg')}})"
        ></div>
        <div class="image-box__overlay"></div>
        <div class="image-box__content">
                <div class="container  text-center justify-content-center">
                        <div class="mb-2">
                                <h2 class="section-heading ">How We Work</h2>
                        </div>
                          <p class="p-4">
                              It's not all about just granting an idea and running with it. We spend a great deal of
                                time researching current we trends, marketing and design evolution, competitive
                                comparsions and the state of creative industries. It's like stocking a toolbox, and
                                becoming skilled at the use of every tool in it.
                          </p>


                          <p>
                              And don't get us wroung, we like to have
                              a little fun along the way...
                          </p>


                </div>
        </div>
      </div>



 <section class="container">
     <div class="row d-flex justify-content-center text-left p-2">
            <div class="col-6">
                    <h3>Team Work</h3>
                    <p>
                        This is because we believe in fostering an enviroment that is
                        stimulating and exciting.We encourage professional development by marketing
                        the best of their individual talents; investing time and money in training
                        to ensure our professionals continue to evolve and success.
                    </p>
                </div>
                <div class="col-6">
                <img class="img-fluid" src="{{asset('/img/the-darkest-minds-1366x768-skylan-brooks-amandla-stenberg-harris-14876.jpg')}}" alt="">
                </div>
     </div>

 </section>


 <section class="container-fluid bg-primary text-light">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-12">
                <h2>Why we do it?</h2>
            </div>
               <div class="col-6 text-left py-2">

                       <p>
                           We started as a small company, a few friends in different industries,
                           marketing, design and development who discovered that we shared the same values
                           and frustrations. We wanted to do it better. Not another agency or IT firm that put profit
                           before people. We wanted to put human experience and center.And that's just what we did.
                       </p>
                   </div>
                   <div class="col-6 text-left py-2">

                        <p>
                            Now we are in company of experts who have all brought together the unique talents
                            A collaborative team has evolved who are inquisitive, driven and engaged.
                            We have shared ideology, we are passionate individuals who believed in making meaningful
                            differences to the companies we partner with. <br>
                            For us the design is in the detail, we are obsessed with quality. We are about the tools we give you. What would you like to create with us?
                        </p>
                    </div>
        </div>

    </section>
@endsection
