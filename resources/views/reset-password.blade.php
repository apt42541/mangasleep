<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
        <div class="row">
            <x-sidebar-member></x-sidebar-member>

            <div class="col-lg-9">
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
                                        <form method="post" action="/member/reset-password">
                                            @csrf

                                            <div class="form-group">
                                                <label class="input-label" for="exampleFormControlInput1">รหัสผ่านเดิม</label>
                                                <input type="password" name="old_password" class="form-control" placeholder="รหัสผ่านปัจจุบัน">
                                            </div>
                                            <div class="form-group">
                                                <label class="input-label" for="exampleFormControlInput2">รหัสผ่าน</label>
                                                <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
                                            </div>
                                            <div class="form-group">
                                                <label class="input-label">ยืนยันรหัสผ่าน</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="ยืนยันรหัสผ่าน" value="">
                                            </div>
                                            <button type="submit" class="btn btn-block btn-grad rounded-pill">
                                                เปลี่ยนรหัสผ่าน
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