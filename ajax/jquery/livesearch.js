$(document).ready(function() { //"$" = "jQuery" to call jquery. jquery help to find d document n if ready, running.
    //deleting search button symbol
    $('#search-button').hide();
    //livesearch event when user inserting search value
    $('#keyword').on('keyup', function() {
        //pop up loading animation
        $('.loading').show(); //"show" to show that has been hiden n "hide" to hide that has been showed. show d laading animation if user inserting value
        
        //live search ajax simple template. only if using Get method. took d data from doc source using GET
        // $('#container').load('livesearch/movie.php?keyword=' + $('#keyword').val()); //"load" to change d value based on doc source

        //live search ajax template to b more flexible using "$.get()"
        $.get('livesearch/movie.php?keyword=' + $('#keyword').val(), function(data) { //val is value on jquery. "data" is param for fucntion n similiar to "xhrresponseText". "$.get" jquery using GET method
        //took d data using GET n then send data too using "function" above
        $('#container').html(data); //change d container based on doc source when user inserting value using "html(data)"
        $('.loading').hide(); //hide d loading animation after user inserting value 
        });
    });
}); 