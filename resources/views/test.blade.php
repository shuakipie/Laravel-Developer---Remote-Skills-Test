<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="{{ url('/') }}" name="baseUrl"/>
		<link href='//fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <title>Create Product</title>
    <!-- Bootstrap core CSS -->
   
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
    
  </head>
<!-- NAVBAR
================================================== -->
  <body ng-app="twilio">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>       		         <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
     
    <!-- Placed at the end of the document so the pages load faster -->
     <div class="container-fluid" ng-controller='sendController' style="margin-top:100px !important;">
        
         <div class='container page-contain'>
			<div class='row' id='about'>
                 
                        <!-- Errors container -->
            @if(count($errors->all())>0)
            <div class="alert alert-danger">

                @foreach($errors->all() as $err)
                {{$err}}<br/>
                @endforeach

            </div>
            @endif
                  <form method="post" action="{{  URL::to('/')}}" role="form" id="login"
                  class="login-form fade-in-effect">
                {{ csrf_field() }}

               

                <div class="form-group">
                    <label class="control-label" for="product">Product</label>
                    <input type="text" class="form-control" name="product" id="product" autocomplete="off"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" autocomplete="off"/>
                </div>
                 <div class="form-group">
                    <label class="control-label" for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="passwd" autocomplete="off"/>
		<br/>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark  btn-block text-left">
                        <i class="fa-lock"></i>
                       Save
                    </button>
                </div>
                
            </form>
			</div>
			<div class='row'>
				<table border="1" style='width: 100%'>
					 <tr> 
					 	<th>Product</th>
					 	<th>Quantity</th>
					 	<th>Price</th>
					 </tr>
					 @foreach($data as $k=>$product)
					  <tr> 
					 	<td>{{$product['product']}}</td>
					 	<td>{{ $product['quantity'] }}</td>
					 	<td>{{ $product['price']}}</td>
					 	{{ $total_qty += $product['quantity'] }}
					 	{{ $total_price += $product['price']}}
					 </tr>
					 @endforeach
					  <tr> 
					 	<td>Total =></td>
					 	<td>{{ $total_qty}}</td>
					 	<td>{{ $total_price}}</td>
					 </tr>
				</table>
			</div>
			
		 </div>
		 
			 
     </div>
    

		
  </body>
</html>
