<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل المدينه</h5>
        </div>
        <form class="edit-form" action="{{route('admin.cities.edit',['id' => $city->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-success hidden SuccessMessage" ></div>
                <div class="alert alert-danger hidden ErrorMessage" ></div>
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>الاسم</label>
                    <input class="form-control" type="text" name="name" value="{{$city->name}}">
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ</button>
                </div>
        </form>
    </div>
</div>