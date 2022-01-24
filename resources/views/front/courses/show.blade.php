
@extends('front.layout')


@section('script')
    <script type="text/javascript" >
        $(document).on('click','#btn_course_ajax',function () {

            var form=$('#course_ajax').serialize();
            var url=$('#course_ajax').attr('action');


            $.ajax({
                url:url,
                datatype:'json',
                data:form,
                type:'post',
                beforeSend:function () {
                    $('#message_course').empty();
                },success:function (data) {
                    if(data.status===true)
                    {
                        $('#message_course').html(
                            '<ul onclick="this.remove()" class="list-unstyled alert alert-info"><li>'
                            +'data added successfully'+
                            '</li></ul>'
                        );
                        $('#course_ajax')[0].reset();
                    }

                },error:function (data_error,exception) {
                    if(exception==='error')
                    {
                        var error_list='';
                        $.each(data_error.responseJSON.errors,function (index,v) {
                            error_list+='<li>'+v+'</li>';
                        });
                        $('#message_course').append('<ul onclick="this.remove()" class="list-unstyled alert alert-danger">'+error_list+'</ul>');
                    }
                }

            });

            return false;
        })
    </script>
@endsection


@section('content')

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Course Details</h2>
                        <p>Homepage <span>/</span> Courses <span>/</span>{{$course->cat->name}}<span>/</span>{{$course->name}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{asset('uploads/courses/'.$course->img)}}" alt="" data-pagespeed-url-hash="417577820" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </div>
                <div class="content_wrapper py-3 ">
                    {!! $course->desc !!}
                </div>
            </div>
            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Trainer’s Name</p>
                                <span class="color">{{$course->trainer->name}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Course Fee </p>
                                <span>${{$course->price}}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="my-5" >
                    <div id="message_course"></div>

                    <form id="course_ajax" class="form-contact contact_form" action="{{route('front.message.enroll')}}" method="post" id="contactForm">
                        {!! csrf_field() !!}
                        <div class="row">

                            <input type="hidden" name="course_id" value="{{$course->id}}">

                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="spec" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your speciality'" placeholder="Enter your speciality">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button id="btn_course_ajax" type="submit" class="button button-contactForm btn_1">Enroll</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
