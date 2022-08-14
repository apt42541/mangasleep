<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class=" ">
        <div class="row">
            <x-sidebar-member></x-sidebar-member>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>ประวัติการเติมเงิน</h5>
                    </div>
                    <div class="p-5">

                        <div class="my-1">
                            <div class=" p-2">
                               
                                <div class="row ">
                                    <div class="col-sm-12 ">
                                        <div class="table-responsive">
                                        <table id="example" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Payment Type</th>
                                                    <th>Payment Amount</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment By Who</th>
                                                    <th>เวลา</th>
                                                    <th>action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payrec as $p)
                                                <tr>
                                                    <td>{{$p->type->paymenttype_type }}</td>
                                                    <td>@if($p->payment_slips != '0') <a href="{{$p->payment_slips}}">clicktoview</a>@endif </td>
                                                    <td>{{$p->payment_price }}</td>
                                                    <td>{{$p->status->paymentstatus_status}}</td>
                                                    <td>{{$p->payBy }} /{{ $p->user->username}}</td>
                                                    <td>{{$p->payment_date}}</td>
                                                    <td>
                                                        <div class="">
                                                        <a href="/systemPanel/verifyPayment/{{$p->payment_id}}/3 " class="btn btn-info " onclick="return confirm('คุณแน่ใจนะว่าจะการทำการอนุมัติรายการเติมเงินนี้')">สำเร็จ</a>
                                                        <a href="/systemPanel/verifyPayment/{{$p->payment_id}}/2" class="btn btn-danger " onclick="return confirm('คุณแน่ใจนะว่าจะทำการการปฎิเสธรายการเติมเงินนี้')">ล้มเหลว</a>

                                                    </div>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        </div>
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
        <script>
            $(document).ready(function() {
                $('#example').dataTable();
            });
        </script>
</x-layout>