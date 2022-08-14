    <x-layout>

        <div class="container  space-bottom-lg-3"></div>
        <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
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
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>รูปแบบ</th>
                                                            <th>จำนวน</th>
                                                            <th>สถานะ</th>
                                                            <th>เวลา</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pay as $p)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$p->type->paymenttype_type}}</td>
                                                            <th>{{$p->payment_price}} &#3647; </th>
                                                            <td>
                                                                <p class="badge  bg-info text-white">{{$p->status->paymentstatus_status}}</p>
                                                            </td>
                                                            <td>{{$p->created_at}}</td>

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