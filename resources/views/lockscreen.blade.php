@extends('layout')

@section('content')


<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
                
                <div class="card-header">
                    <h1 class="text-center">{{ __('Lock Screen') }}<h1>

                    </div>
                    <br>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                       



        </div>
                    </div>
<br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br>
<br>
                       
<br>
                        <div class="mb-0 form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection