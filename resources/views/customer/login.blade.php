@extends('layout.base') 


@section('content')

<h2>Customer Login</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="{{ route('customer.handleLogin') }}" method="POST">
        @csrf
			<h1>Sign in</h1>

            @if(session('error'))
                <p style="color: red;font-weight:bold">{{ session('error') }}</p>
            @endif
			
			<input type="username" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			
		</div>
	</div>
</div>




@endsection