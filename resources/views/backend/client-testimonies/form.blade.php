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
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                {!! Form::label('slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}

                @if($errors->has('slug'))
                    <span class="help-block">{{ $errors->first('slug') }}</span>
                @endif
            </div>
            <div class="form-group col-xs-9 {{ $errors->has('title_of_client') ? 'has-error' : '' }}">
                {!! Form::label('title_of_client') !!}
                {!! Form::text('title_of_client', null, ['class' => 'form-control','style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
            </div>
            <div class="form-group col-xs-9 {{ $errors->has('message') ? 'has-error' : '' }}">
                {!! Form::label('message') !!}
                {!! Form::textarea('message', null, ['class' => 'form-control','style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

                @if($errors->has('message'))
                    <span class="help-block">{{ $errors->first('message') }}</span>
                @endif
            </div>
        </div>
    </div>
  <!-- /.box -->
</div>

<div class="col">



   

    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-name">Profile Picture</h3>
        </div>
        <div class="card-body text-center">
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="justify-content-center fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="{{ ($testimony->image_thumb_url) ? $testimony->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>

                @if($errors->has('image'))
                    <span class="help-block">{{ $errors->first('image') }}</span>
                @endif
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $testimony->exists ? 'Update' : 'Save' }}</button>
            <a href="{{ route('backend.client-testimonies.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    
</div>
