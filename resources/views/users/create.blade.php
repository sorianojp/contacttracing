@extends('layouts.app')
@section('content')



@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Name:</label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Email:</label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Password:</label>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Confirm Password:</label>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Role:</label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Select Grade (For Faculty Only)</label>
            <select class="form-control" name="grade_id">
            <option value="">...</option>
            @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
