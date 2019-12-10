

    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-12 col-lg-12">
        <label for="name">YOUR NAME *</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="YOUR NAME *">

        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} col-md-12 col-lg-12">
        <label for="email">EMAIL ADDRESS *</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="EMAIL ADDRESS *">

        @if($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>


    <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }} col-md-12 col-lg-12">
        <label for="company">COMPANY *</label>
        <input class="form-control" type="text" name="company" id="company" placeholder="COMPANY *">

        @if($errors->has('company'))
            <span class="help-block">{{ $errors->first('company') }}</span>
        @endif
    </div>




        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }} col-md-12 col-lg-12">
            <label for="telephone">TELEPHONE</label>
            <input class="form-control" type="text" name="telephone" id="telephone" placeholder="TELEPHONE">

            @if($errors->has('telephone'))
                <span class="help-block">{{ $errors->first('telephone') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('idea') ? 'has-error' : '' }} col-md-12 col-lg-12">
            <label for="idea">YOUR IDEA</label>
            <input class="form-control" type="text" name="idea" id="idea" placeholder="YOUR IDEA">

            @if($errors->has('idea'))
                <span class="help-block">{{ $errors->first('idea') }}</span>
            @endif
        </div>


        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} col-md-12 col-lg-12">
            <label for="description">DESCRIPTION</label>
            <textarea class="form-control" type="text" name="description" id="description" placeholder="DESCRIPTION"></textarea>

            @if($errors->has('description'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('budget') ? 'has-error' : '' }} col-md-12 col-lg-12">
                <label for="budget">BUDGET</label>
            <input id="budget" type="text" name="budget" value="">
            @if($errors->has('budget'))
                <span class="help-block">{{ $errors->first('budget') }}</span>
            @endif
        </div>



        <div class="form-group {{ $errors->has('time_done') ? 'has-error' : '' }} col-md-12 col-lg-12">
            <label for="time_done">WHEN DO YOU EXPECT IT DONE</label>
            <input class="form-control" type="text" name="time_done" id="time_done" placeholder="WHEN DO YOU EXPECT IT DONE">

            @if($errors->has('time_done'))
                <span class="help-block">{{ $errors->first('time_done') }}</span>
            @endif
        </div>


        <div class="form-group {{ $errors->has('field_industry_id') ? 'has-error' : '' }} col-md-12 col-lg-12">
            {!! Form::select('field_industry_id', App\FieldIndustry::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose Field Industry']) !!}

            @if($errors->has('field_industry_id'))
                <span class="help-block">{{ $errors->first('field_industry_id') }}</span>
            @endif
        </div>
        <div class="mr-auto ml-2">
            <button type="submit" class="btn btn-primary">{{ 'Submit Request' }}</button>
        </div>













