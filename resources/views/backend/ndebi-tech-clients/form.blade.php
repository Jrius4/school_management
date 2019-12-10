<div class="col-xs-9">
    <div class="card">
        <div class="card-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
          
        </div>
    </div>
  <!-- /.box -->
</div>

<div class="col">


   

    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title">Logo</h3>
        </div>
        <div class="card-body text-center">
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="justify-content-center fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="{{ ($client->image_thumb_url) ? $client->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('logo') !!}</span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>

                @if($errors->has('logo'))
                    <span class="help-block">{{ $errors->first('logo') }}</span>
                @endif
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $client->exists ? 'Update' : 'Save' }}</button>
            <a href="{{ route('backend.ndebi-tech-clients.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    
</div>
