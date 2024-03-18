<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل راي العميل</h5>
        </div>
        <form class="edit-form" action="{{route('admin.testimonials.edit',['id' => $member->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-success hidden SuccessMessage" ></div>
                <div class="alert alert-danger hidden ErrorMessage" ></div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>الاسم</label>
                    <input class="form-control" type="text" name="name" value="{{$member->name}}">
                </div>
                <div class="form-group">
                    <label>الموقع</label>
                    <input type="text" class="form-control" name="location" value="{{$member->location}}">
                </div>
                <div class="form-group">
                    <label>المحتوي</label>
                    <textarea class="form-control" name="description">{{$member->description}}</textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>