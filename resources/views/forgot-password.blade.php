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
                                        @if (session()->has('status'))
                                        <div class="alert alert-success">

                                            {{ session('status')}}
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
                                        <form method="post" action="/forgot-password">
                                            @csrf

                                            <div class="form-group">
                                                <label class="input-label" for="exampleFormControlInput1">อีเมล</label>
                                                <input type="email" name="email" class="form-control" placeholder="อีเมลล์">
                                            </div>
                                         
                                            <button type="submit" class="btn btn-block btn-grad rounded-pill">
                                                รีเซ็ทรหัสผ่าน
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