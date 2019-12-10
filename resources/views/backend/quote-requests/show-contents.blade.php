<div class="col-md-10 card bg-info m-auto p-4 rounded text-left">



    <div class="card-header">
        <h4 class="card-title">Company:&nbsp;&nbsp;{{$quote_request->company}}</h4>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex justify-content-around">
            <div class="col-md-6">
                <h3>Email</h3><p>{{$quote_request->email}}</p> <br>
                <h3>Name</h3><p>{{$quote_request->name}}</p>
            </div>
            <div class="col-md-6">
                <h3>Idea</h3><p>{{$quote_request->idea}}</p><br>
                <h3>Description</h3><p>{{$quote_request->description}}</p>
            </div>
            <div class="col-md-6">
                <h3>Budget</h3><p>{{'$ '.$quote_request->budget}}</p> <br> <h3>Time Scope</h3><p>{{$quote_request->time_done}}</p>
            </div>
            <div class="col-md-6">
                Field Industry:&nbsp;&nbsp;{{$quote_request->fieldIndustry->title}}
            </div>
        </div>





    </div>
</div>
