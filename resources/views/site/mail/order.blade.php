<!DOCTYPE html>
<html>
    <head>
        <title>طلب جديد</title>
    </head>
    <body>
        <h1>هذه رساله من  : {{$username}}</h1>

        <span> الاسم بالكامل : {{$username}}</span><br>
        <span> رقم الهاتف : {{$userphone}}</span><br>
        <span> المدينه : {{$usercity}}</span><br>
        <span> العنوان : {{$useraddress}}</span><br>
        <span> طريقة التواصل : {{$userreceive}}</span><br>
        <span> طريقه الدفع : {{$userpayment}}</span><br>
        <span> اسم المنتج : {{$productname}}</span><br>
        <span> كميه المنتج : {{$productqty}}</span><br>
        <span> سعر المنتج : {{$productprice}}</span><br>
        <span> الحجم : {{$productkind}}</span><br>
        <span> نوع الذبيحه : {{$producttype}}</span><br>
        @if($producttype != 'حي')
            <span> طريقه التقطيع : {{$productcutting}}</span><br>
            @if($settings->packing == 1)
                <span> طريقه التغليف : {{$productpacking}}</span><br>
            @endif
            <span>مفروم : {{$productminced}}</span><br>
            @if($productminced == 'نعم')
                <span>كم كيلو : {{$productweight}}</span><br>
            @endif
            @if($settings->head == 1)
                <span> الراس : {{$producthead}}</span><br>
            @endif
        @endif
        <span> التعليقات : {{$productcomments}}</span><br>
        <span> اجمالي المبلغ : {{$productsubtotal}}</span><br>

        
    </body>

</html>