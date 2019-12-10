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
            <div class="form-group col-xs-9 {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                {!! Form::label('excerpt') !!}
                {!! Form::textarea('excerpt', null, ['class' => 'form-control','style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
            </div>
            <div class="form-group col-xs-9 {{ $errors->has('body') ? 'has-error' : '' }}">
                {!! Form::label('body') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control','style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

                @if($errors->has('body'))
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
            <button type="submit" class="btn btn-primary">{{ $process->exists ? 'Update' : 'Save' }}</button>
            <a href="{{ route('backend.system-processes.index') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    
</div>
