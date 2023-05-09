@extends('layouts.login')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="input-group form-group">
					{{-- <div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div> --}}
					<input name="email" type="email" class="form-control" placeholder="Email">
                </div>

				<div class="input-group form-group">
					{{-- <div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div> --}}
					<input name="password" type="password" class="form-control" placeholder="Password">
                </div>



                {{-- <div class="custom-control custom-checkbox dark-label">
                    <input type="checkbox" name="remember" class="custom-control-input" id="defaultUnchecked">
                        <label class="custom-control-label" for="defaultUnchecked">Recuerdame</label>

				</div> --}}
				<br>
				<div class="form-group" style="text-align:center">
					<input type="submit" value="Ingresar" class="btn text-uppercase login_btn">
				</div>

        </form>

    </div>
@endsection
