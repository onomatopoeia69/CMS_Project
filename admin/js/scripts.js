$(document).ready(function() {
    $('#summernote').summernote({

        height: 300

    });
  });




  $(document).ready(function(){


    $('#SelectAllCheckBoxes').click(function(event){

                if(this.checked){


                    $('.checkboxes').each(function(){



                        this.checked = true;



                    });



                }else{


                    $('.checkboxes').each(function(){



                        this.checked = false;



                    });
                        



                }



            });


         


  });