<x-layout>
    <div class="my-3">
        <div class="card p-2">
            <div class="card-header mb-2">
                <h3 style="color: rgb(0, 66, 132); cursor: pointer;"><i class="fas fa-arrow-circle-left mr-2 "></i>แก้ไข</h3>
            </div>
            <div class="row">
                <form action="/systemPanel/manga/{{$manga->manga_id}}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group my-3 px-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="manga_cover" class="custom-file-input" accept="image/*">
                            <label class="custom-file-label">Choose file manga cover</label>
                        </div>
                    </div>
                    <div class="input-group my-3 px-5">
                        <input type="hidden" class="form-control" placeholder="manga name" name="manga_id" value="{{$manga->manga_id}}">
                    </div>
                    <div class="input-group my-3 px-5">
                        <input type="text" class="form-control" placeholder="manga name" name="manga_name" value="{{$manga->manga_name}}">
                    </div>
                    <div class="input-group my-3 px-5">
                        <textarea name="manga_description" class="form-control" cols="30" rows="10">{{$manga->manga_description}}</textarea>
                    </div>
                    <div class="input-group my-3 px-5">
                        <input type="text" class="form-control" placeholder="manga slugs" name="manga_slugs" value="{{$manga->manga_slugs}}">
                    </div>
                    <div class="input-group my-3 px-5">
                        <input type="text" class="form-control" placeholder="manga rating" name="manga_rating" value="{{$manga->manga_rating}}">
                    </div>
                    <div class="input-group my-3 px-5">
                        <input type="text" class="form-control" placeholder="manga hot" name="manga_hot" value="{{$manga->manga_hot}}">
                    </div>
                    <div class="my-3 px-5">
                        <button class="btn btn-primary">ยืนยัน</button>
                    </div>
                </form>


            </div>
        </div><!--  -->
    </div>
</x-layout>