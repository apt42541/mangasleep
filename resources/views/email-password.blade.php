<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>เปลี่ยนรหัสผ่าน</h5>
                    </div>
                    <div class="p-5">

                        <div class="my-1">
                            <div class=" p-2">
                                <div class="row">
                                    <div class="col-12">
                                        @if (session()->has('msg'))
                                        <div class="alert alert-success">

                                            {{ session('msg')}}
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <!-- Password Reset Token -->
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                            <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')" />

                                                <x-input id="password" class="form-control" type="password" name="password" required />
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="mt-4">
                                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                                            </div>

                                            <button type="submit" class="btn btn-block btn-grad rounded-pill">
                                                    {{ __('Reset Password') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div><!--  -->
                        </div>
                    </div>
                </div>
            </div>


        </div>

</x-layout>