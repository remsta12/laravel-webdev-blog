@extends('layout.mainlayout')

@section('content')
<!-- MAY NEED TO REUSE ABOUT HEADING AS THE NAVRBAR DESIGN FAILS WHEN THE HEADER IS COMPLETELY REMOVED
MASTHEAD COMPLETELY LINKED TO IT ALL SO MUST BE INCLUDED SOMEHOW, COULD JUST MAKE ANOTHER FILE AND HEADER THAT BARELY DISPLAYS-->
<div class="container">
  <div class="row">
    <div class="col-5">
      <h1>Details</h1>
      <p>A few fake details so you cannot completely identify me</p>
      <p class="contact-address"><address><strong>Remy Corp.</strong><br>
          131 Rest Easy Drive<br>
          Londonium, Britannia <br>
          <em>07745921033</em></address>
      </p>
    </div>
    <div class="col-7" id="contact-details">
      {!! Form::open(['route' => 'contact.msg']) !!}
        <div class="form-group" id="contact-form">
          {!! Form::label('name', 'Enter your name') !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}<br>

          {!! Form::label('email', 'Enter your e-mail address') !!}
          {!! Form::text('email', null, ['class' => 'form-control']) !!} <br>

          {!! Form::label('message', 'Please write your message') !!}
          {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => '4']) !!} <br>

          {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection
