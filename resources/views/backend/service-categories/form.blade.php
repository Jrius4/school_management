<div class="col-xs-9">
  <div class="card">
    <div class="card-body ">

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {!! Form::label('title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}

            @if($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
            {!! Form::label('slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}

            @if($errors->has('slug'))
                <span class="help-block">{{ $errors->first('slug') }}</span>
            @endif
        </div>

        <div class="form-group col-xs-9 {{ $errors->has('description') ? 'has-error' : '' }}">
            {!! Form::label('description') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control','style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

            @if($errors->has('description'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title">Feature Image</h3>
        </div>
        <div class="card-body text-center">
            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="justify-content-center fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="{{ ($category->image_thumb_url) ? $category->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
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
    <!-- /.box-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('backend.service-categories.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
