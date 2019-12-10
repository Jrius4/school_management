
<!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">REQUEST A QUOTE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                            {{-- <form action="{{route('quote-requests.store')}}" method="POST" > --}}
                            {!! Form::model($quote_request, [
                                'method' => 'POST',
                                'route'  => 'quote-requests.quote-requests.store',
                                'files'  => TRUE,
                                'id' => 'post-form'
                            ]) !!}
                                <div class="row d-flex justify-content-between">
                                    @include('home.modals.form')
                                </div>
                            {!! Form::close() !!}
                            {{-- </form> --}}

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

            </div>
        </div>
    </div>

