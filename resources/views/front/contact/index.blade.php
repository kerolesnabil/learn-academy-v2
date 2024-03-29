
@extends('front.layout')

@section('styles')
    <style>
        iframe{
            width: 100%;
        }
    </style>
@endsection
@section('script')
    <script type="text/javascript" >
        $(document).on('click','#btn_contact_ajax',function () {

            var form=$('#contact_ajax').serialize();
            var url=$('#contact_ajax').attr('action');

            $.ajax({
                url:url,
                datatype:'json',
                data:form,
                type:'post',
                beforeSend:function () {
                    $('#message_contact').empty();
                },success:function (data) {
                    if(data.status===true)
                    {
                        $('#message_contact').html(
                            '<ul onclick="this.remove()" class="list-unstyled alert alert-info"><li>'
                            +'data added successfully'+
                            '</li></ul>'
                        );
                        $('#contact_ajax')[0].reset();
                    }

                },error:function (data_error,exception) {
                    if(exception==='error')
                    {
                        var error_list='';
                        $.each(data_error.responseJSON.errors,function (index,v) {
                            error_list+='<li>'+v+'</li>';
                        });
                        $('#message_contact').append('<ul onclick="this.remove()"" class="list-unstyled alert alert-danger">'+error_list+'</ul>');
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
                            <h2>Contact us</h2>
                            <p>Home<span>/<span>Contact us</span></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section section_padding">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    {!! $settings->map !!}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">

                    <div id="message_contact"></div>

                    <form id="contact_ajax" class="form-contact contact_form" action="{{route('front.message.contact')}}" method="post" id="contactForm">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button id="btn_contact_ajax" type="submit" class="button button-contactForm btn_1">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>{{$settings->city}}</h3>
                            <p>{{$settings->adress}}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>{{$settings->phone}}</h3>
                            <p>{{$settings->work_hours}}</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>{{$settings->email}}</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
