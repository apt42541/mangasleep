<x-layout>
    <div>
        <div class="container  space-bottom-lg-3"></div>
        <div class="container space-1 space-top-lg-0 space-bottom-lg-2 mt-lg-n10">
            <div class="col-lg-12 px-0">
                <div class="card p-2">
                    <div class="card-header mb-2">
                        <h3 style="color: rgb(0, 66, 132); cursor: pointer;"><i class="fas fa-arrow-circle-left mr-2 "></i>รายละเอียด</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 text-center"><img draggable="false" class="rounded mb-2" height="308px" width="220" src="<?= $manga->manga_cover; ?>"></div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 ">
                            <div class="d-flex justify-content-between flex-column">
                                <div class="row ">
                                    <div class="col-md-12"><strong>
                                            <h1 class="modal-title font-weight-bold h2" id="myExtraLargeModalLabel"><?= $manga->manga_name ?></h1>
                                        </strong></div>
                                </div>

                                <div class="my-1" style="font-size: 24px; font-family: Sarabun;"></div>


                                <div class="col-12">
                                    <div class="row mt-4" style="background: rgb(247, 250, 255); border-radius: 15px; height: auto; padding: 10px 0px;">

                                        <div class="col-md-6 text-center mt-3">
                                            <div class="d-flex  flex-wrap mt-2 ">
                                                <a href="/systemPanel/manga/<?= $manga->manga_id ?>/chapter/add" class="btn btn-primary rounded-pill btn-sm m-2">
                                                    <i class="fas fa-plus"></i> <span>เพิ่มตอนใหม่ </span>
                                                </a>
                                                <a href="/systemPanel/manga/<?= $manga->manga_id ?>/editManga" class="btn btn-outline-primary rounded-pill btn-sm m-2">
                                                    <i class="fas fa-edit"></i> <span>แก้ไข</span>
                                                </a>
                                                <button class="btn btn-outline-primary rounded-pill btn-sm m-2" disabled="">
                                                    <i class="fas fa-trash-alt"></i> <span>ลบ</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-1">
                        <h3 class="font-weight-bold">เรื่องย่อ</h3>
                        <textarea class="form-control" cols="30" rows="10"><?= $manga->manga_description; ?></textarea>
                        <div id="module" class="container">
                            <p class="collapse" id="collapseExample" aria-expanded="false">
                            <p class="fontDetail text-dark">
                            <div id="contentHtml" class=""></div>
                            </p>
                            </p><a role="button" class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"></a>
                        </div>
                    </div>
                    @if (session()->has('status'))
                    <div class="alert alert-success">

                        {{ session('status')}}
                    </div>
                    @endif

                    <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Chapter num</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> <?php foreach ($manga->chaptersv1 as $chapter) : ?>
                                <tr>
                                    <td><?= $chapter->chapter_slugs ?></td>
                                    <td>
                                        <a href="/systemPanel/manga/{{ $manga->manga_id }}/{{ $chapter->chapter_id }}/delete" class="btn btn-danger">Delete</a>
                                        <a href="/systemPanel/manga/{{ $chapter->chapter_id }}/isFree" class="btn btn-info">IsFree</a>
                                        <a href="/systemPanel/manga/{{ $chapter->chapter_id }}/isSell" class="btn btn-warning">IsSell</a>
                                        <a href="/systemPanel/manga/{{ $chapter->chapter_id }}/edit" class="btn btn-info">edit</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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