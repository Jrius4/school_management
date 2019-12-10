<div class="col-xs-9">
    <div class="card">
        <div class="card-body">

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
                    <span class="help-block">{{ $errors->first('body') }}</span>
                @endif
            </div>
        </div>
    </div>
  <!-- /.box -->
</div>

<div class="col">



   


    <div class="card">
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $industry->exists ? 'Update' : 'Save' }}</button>
            <a href="{{ route('backend.field-industries.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    
</div>
