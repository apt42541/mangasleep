<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
        <div class="row">
            <x-sidebar-member></x-sidebar-member>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>เติมเงิน</h5>
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
                                        <img src="/assets/PAY-01.jpg"  style="width:100%;" alt="">
                                        <form action="/member/pay" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <h3>จำนวนที่เติม</h3>
                                            <input type="number" name="amount" class="form-control" min="50" max="10000">
                                            <h3>วันเวลาที่โอน</h3>
                                            <input type="text" name="date_pay" class="form-control" placeholder="14-02-2565 18.00">
                                            <h3>ผู้โอน</h3>
                                            <input type="text" name="payWho" class="form-control" placeholder="ชื่อคนเติม">
                                            <h3>เลือกประเภทการเติมเงิน</h3>
                                            <select name="payment_type" class="form-control my-5" id="">
                                                <option value="" disabled="disabled" selected>เลือกรูปแบบการเติมเงิน</option>
                                                <option value="1">โอนธนาคาร</option>
                                                <option value="2">Truemoney</option>
                                                <option value="3">Promptpay</option>
                                            </select>
                                            <div class="input-group my-3 px-5">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="payment_slips" class="custom-file-input" accept="image/*">
                                                    <label class="custom-file-label">เลือกไฟล์สลิป</label>
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-start">
                                                <button class="btn btn-primary w-25" type="submit"><i class="fas fa-save"></i>
                                                    ยืนยันการเติมเงิน
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!--  -->
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</x-layout>