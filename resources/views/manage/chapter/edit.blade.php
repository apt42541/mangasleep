<x-layout>
    <div class="col-lg-12 px-0">
        <div class="card">
            <div class="card-header" style="background-color: rgb(55, 125, 255);">
                <div>
                    <h3 class="text-white"><i class="fas fa-arrow-circle-left mr-2 " type="button"></i>ตอนที่ <?= $chapter->chapter_slugs ?></h3>
                </div>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/systemPanel/chapter/{{$chapter->chapter_id}}/update" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><strong>ชื่อตอน</strong></div>
                                <div></div>
                            </div><input class="form-control" id="chapter_slugs" name="chapter_slugs" placeholder="ระบุชื่อตอน" value="{{$chapter->chapter_slugs}}">
                        </div>
                    </div>
                    <section class="container mt-3 p-0">
                        <input type="hidden" id="manga_slugs" name="manga_slugs" value="<?= $chapter->chapter_slugs ?>">
                        <input type="hidden" id="manga_id" name="manga_id" value="<?= $chapter->manga_id ?>">
                        <input type="hidden" id="a_token" name="_token" value="{{ csrf_token() }}" />
                        <div class="clsbox-1" runat="server">
                            <div class="dropzone rounded bg-light p-3 mb-5" style="border: 1px dashed rgb(204, 204, 204);" id="mydropzone">

                            </div>
                        </div>
                        <h3>อัพโหลดภาพการ์ตูน</h3>
                        <input multiple="true" class="dropzone" name="upload" type="file" autocomplete="off" tabindex="-1" style="display: none;">
                        <div>
                            <textarea class="form-control mb-5" id="chapter_post" name="chapter_post" id="" cols="10" rows="5">
                            {{$chapter->chapter_post}}
                            </textarea>
                        </div>
                    </section>
                    <h3>ราคา</h3>
                    <input type="text" name="chapter_price" class="form-control" value="{{$chapter->chapter_price}}">
                    <h3>เปิดฟรีหรือขาย</h3>
                    <select name="isFree" class="form-control my-5" id="chapter">
                        <option value="" disabled="disabled" selected>Select Type Free</option>
                        <option value="0">Free</option>
                        <option value="1">Sell</option>
                        <option value="3">Login</option>
                    </select>
                    <div class="row d-flex justify-content-start">
                        <a href="/systemPanel/manga/<?= $chapter->manga_id ?>/view" class="btn btn-secondary mr-2 w-25"> ยกเลิก</a>

                        <button class="btn btn-primary w-25" type="submit"><i class="fas fa-save"></i>
                            บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-chapter.addscript>
    </x-chapter.addscript>
</x-layout>