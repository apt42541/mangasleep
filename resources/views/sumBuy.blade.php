<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class=" ">
        <div class="row">
            <x-sidebar-member></x-sidebar-member>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>สรุปยอดรายเดือน</h5>
                    </div>
                    <div class="p-5">

                        <div class="my-1">
                            <div class=" p-2">
                                <div class="row">
                                    @if(isset($buy))
                                    <table id="example" class="table bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($buy as $b)
                                                <td>
                                                    {{ $b->manga_name}}
                                                <td>{{ $b->created_at}}

                                                </td>
                                            </tr>


                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endif
                                    <div class="col-sm-12 table-responsive">


                                        <form action="/systemPanel/reportBuySum" method="post">
                                            @csrf
                                            <h3>ดึงสรุปยอดคนซื้อ</h3>
                                            <select name="manga_id" id="">
                                                @foreach($manga as $m)
                                                <option value="{{$m->manga_id}}">{{$m->manga_name}}</option>
                                                @endforeach

                                            </select>
                                            <input type="date" name="start" class="form-control my-2">
                                            <input type="date" name="end" class="form-control my-2">
                                            <div class="row d-flex justify-content-start">
                                                <button class="btn btn-primary w-25" type="submit"><i class="fas fa-save"></i>
                                                    ยืนยันข้อมูล
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
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                    ]
                });
            });
        </script>
</x-layout>