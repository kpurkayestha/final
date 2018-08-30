@extends('layouts.index')

@section('title', 'AskMe || Login')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')

    @extends('section.msg')
    
    <div class="container" style="margin-top: 200px;margin-bottom: 110px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Reset Password</div>
                <div class="panel-body">
                    
                    
                    <form action="" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        
                            <div class="col-md-8 col-md-offset-2">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email"  placeholder="Enter your email" required />
                                </div>
                                @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                        </div>


                      


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input class="btn btn-danger" type="reset" name="cancel" value="Cancel">
                                <input class="btn btn-info" type="submit" name="login" value="Login">
                            </div>
                            
                        </div>

                        
                </form>
                

                </div>
            </div>
        </div>
    </div>
@endsection
    