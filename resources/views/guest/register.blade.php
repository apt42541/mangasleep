<x-layout>
    <div class="my-3">
        <div class="card p-2">
            <div class="card-header mb-2">
                <h3 style="color: rgb(0, 66, 132); cursor: pointer;">ลงทะเบียน</h3>
            </div>
            <div class="row">
                <div class="col-12 p-5">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="/member/register/store">
                        @csrf
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1">อีเมล</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="input-label" for="exampleFormControlInput1">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
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
                            ลงทะเบียน
                        </button>
                        <hr>
                    </form>
                </div>
            </div>
        </div><!--  -->
    </div>
</x-layout>