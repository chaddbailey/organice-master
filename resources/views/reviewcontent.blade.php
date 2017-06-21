@extends('layouts.reviews')

@section('title')
Rate Services
@endsection

@section('ratingstyle')

  <style type="text/css">

     /* Enhance the look of the textarea expanding animation */
     .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
      }

      .stars {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
      }

      .ratings 
    {
        color: #d17581;
        padding-left: 10px;
        padding-right: 10px;
    }

    .thumbnail{ padding: 0;}


    .caption{
        height: 130px;
        overflow: hidden;
    } 

    .caption h4
    {
        white-space: nowrap;
    }

    .thumbnail .caption-full {
    padding: 9px;
    color: #333;
    }

    footer{
      margin-top: 50px;
      margin-bottom: 30px;
    }
  </style>
@stop




@section('script')
	 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places&callback=initMap"></script>
	 <script type="text/javascript" src="../js/expanding.min.js"></script>
	 <script type="text/javascript" src="../js/starrr.js"></script>
	 <script>
			jQuery("#myMap").on("shown.bs.modal", function () {
				google.maps.event.trigger(map, "resize");
				map.setCenter(centers);
			});
	 </script>
	 <script type="text/javascript">
	 	
	 		$(function(){

	 			      // initialize the autosize plugin on the review text area
	 			      $('#new-review').autosize({append: "\n"});

	 			      var reviewBox = $('#post-review-box');
	 			      var newReview = $('#new-review');
	 			      var openReviewBtn = $('#open-review-box');
	 			      var closeReviewBtn = $('#close-review-box');
	 			      var ratingsField = $('#ratings-hidden');

	 			      openReviewBtn.click(function(e)
	 			      {
	 			        
	 			        reviewBox.slideDown(400, function()
	 			          {
	 			            $('#new-review').trigger('autosize.resize');
	 			            newReview.focus();
	 			          });
	 			        openReviewBtn.fadeOut(100);
	 			        closeReviewBtn.show();
	 			      });

	 			      closeReviewBtn.click(function(e)
	 			      {
	 			        e.preventDefault();
	 			        reviewBox.slideUp(300, function()
	 			          {
	 			            newReview.focus();
	 			            openReviewBtn.fadeIn(200);
	 			          });
	 			        closeReviewBtn.hide();
	 			        
	 			      });

	 			      // If there were validation errors we need to open the comment form programmatically 
	 			      @if($errors->first('comment') || $errors->first('rating'))
	 			        openReviewBtn.click();
	 			      @endif

	 			      // Bind the change event for the star rating - store the rating value in a hidden field
	 			      $('.starrr').on('starrr:change', function(e, value){
	 			        ratingsField.val(value);
	 			      });
	 			    });
	 </script>
@endsection