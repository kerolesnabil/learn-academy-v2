<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" >
        <title>login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('front/css')}}/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="{{asset('front/css')}}/animate.css">
    </head>
    <body>
     <div class="container p-5 m-5 "   >
         @include('admin.inc.errors')
         <form method="post" action="{{route('admin.doLogin')}}" >
             {{csrf_field()}}
             <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label>
                 <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
     </div>



    </body>


    <!-- jquery -->
    <script src="{{asset('front/js')}}/jquery-1.12.1.min.js"></script>

    <!-- bootstrap js -->
    <script src="{{asset('front/js')}}/bootstrap.min.js"></script>

    <script src="{{asset('front/js')}}/jquery.nice-select.min.js"></script>


    <script src="{{asset('front/js')}}/jquery.counterup.min.js"></script>

</html>

