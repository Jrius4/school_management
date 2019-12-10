
@extends('home.contact-us.layout')

@section('content')


<div class="mt-0 pt-0 container-fluid" style="margin-top:-200px;background:{{false?null:'radial-gradient(circle, rgba(28,41,223,0.8799719716988358) 0%, rgba(5,96,203,1) 100%);'}} ">
    <div  class="row d-flex justify-content-center" style="min-height:250px;min-width:100%;margin-top:-20px">

                <div class="col-md-6 text-light py-5">
                    <h3>Contact Us</h3>


                </div>

    </div>
</div>




<header class="" style="margin-top:-25px">
    <div class="container text-center">


       <div class="row justify-content-around">
         <div class="col-md-3 contact-card col-sm-4 py-4 card  mb-3">
           <div class="card-body">
                <h4 >Business</h4>
                <p>
                        We believe that the success of our company is a result of our client
                        growth. Like what we do? give us a call <br>
                        <strong>0200 90 55 65</strong>
               </p>
           </div>
         </div>

         <div class="col-md-3 contact-card col-sm-4 py-4 card  mb-3">
            <div class="card-body">
                <h4 >Press</h4>
                <p>
                    We believe that the success of our company is a result of our client
                    growth. Like what we do? give us a call <br>
                    <strong>info@ndebitech.com</strong>
                </p>
            </div>
         </div>

         <div class="col-md-3 contact-card col-sm-4 py-4 card   mb-3">
                <div class="card-body">
                    <h4 >Support</h4>
                    <p>
                            We believe that the success of our company is a result of our client
                            growth. Like what we do? give us a call <br>
                            <strong>www.ndebitech.com</strong>
                    </p>
                </div>
             </div>


    </div>

</header>

<section class="container">
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <h2>Hello, <br>How can we help?</h2>
        <p>
            Ntinda Complex, Block C, level 3 <br>Ntinda,Kampala, Uganda
        </p>
    </div>
    <div class="col-md-6">
        <form id="contact-form" method="get" action="" class="custom-form form">
                <div class="controls">


                        <div class="form-group">
                                <p for="name">Your firstname *</p>
                                <input type="text" name="name" id="name" placeholder="Enter your firstname" required="required" class="form-control">
                        </div>



                    <div class="form-group">
                        <p for="email">Your email *</p>
                        <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <p for="message">Your message for us *</p>
                        <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required" class="form-control"></textarea>
                    </div>
                    <input type="submit" value="Send message" class="btn btn-primary">

                </div>
          </form>
    </div>
</div>
</section>



<div class="col-12 text-center">
        <h2>Drop by for a coffee</h2>
    </div>
 <section class="container-fluid bg-primary text-light">
        <div class="row d-flex justify-content-center text-center">

        </div>

    </section>
@endsection
