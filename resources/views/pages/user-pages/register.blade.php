@extends('layout.master-mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Register</h2>
      <div class="auto-form-wrapper">
      <form method="POST" action="{{ route('register.perform') }}">
        @csrf
        <!-- <form action="#"> -->
          <div class="form-group">
            <div class="input-group">
              <!-- <input type="text" class="form-control" placeholder="Username"> -->
              <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Name" value="{{ old('username') }}" >
              @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              <!-- <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div> -->
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
             @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              <!-- <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div> -->
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
              @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              <!-- <input type="password" class="form-control" placeholder="Confirm Password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div> -->
            </div>
          </div>
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
            <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" >
                <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                    Conditions</a>
                </label>
                @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
              <!-- <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label> -->
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Already have and account ?</span>
            <a href="{{ url('/login') }}" class="text-black text-small">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection