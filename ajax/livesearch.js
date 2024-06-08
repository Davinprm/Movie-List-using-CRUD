//took d element
var keyword = document.getElementById('keyword'); //make var using "var" on JSn took d element on another doc using "document.getElementById('x')" n x is for ID
var searchbutton = document.getElementById('search-button');
var container = document.getElementById('container');

//add event when filling search container 
keyword.addEventListener('keyup', function() { //"keyword" is for call d var that has been made above. "addEventListener('x', 'function'() {};)" "x" is for d event n "function" to execute method
    //make ajax object
    var xhr = new XMLHttpRequest(); //
    //check ajax ready by "onreadystatechange"
    xhr.onreadystatechange = function () 
    {if(xhr.readyState == 4 && xhr.status == 200) //0 = inisialization, 1 = open connection, 2, 3,& 4 = ready. 200 = ready & 404 = file not found
        {container.innerHTML = xhr.responseText;}//call container id n "innerHTML" for choose whatever user's value n then change to "xhr.responseText" is value based on source value keyword
        ;};
    //ajax execution. "open" for open d ajax connection. 3 param (what req method 'GET/POST', what source 'file', asyncronus/syncronus 'true/false' )
    xhr.open('GET', 'ajax/movie.php?keyword=' + keyword.value, true); //"+" for connect string n "value" for took whatever d user's value inserted on id keyword
    //also added "?keyword=" for sending keyword's value that has been inserted by user to another doc, to return n show d specific value's request by user
    xhr.send(); //running ajax
}); 