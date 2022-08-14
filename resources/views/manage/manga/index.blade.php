<x-layout>

    <div class="container  space-bottom-lg-3"></div>
    <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
        <div class="row">
            <x-sidebar-member></x-sidebar-member>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>หนังสือของฉัน</h5><a href="/systemPanel/manga/add" class="btn btn-primary rounded-pill" data-toggle="modal" data-target=".bookSet-modal"><i class="fas fa-plus"></i> เพิ่มหนังสือ</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('status'))
                        <div class="alert alert-success">

                            {{ session('status')}}
                        </div>
                        @endif
                        <?php if ($mangas) : ?>


                            <div class="my-1">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>เรื่อง</th>
                                            <th>จัดการ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mangas as $b)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$b->manga_name}}</td>
                                            <td><a href="/systemPanel/manga/{{$b->manga_id}}/view">Update</a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            <?php endif; ?>

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