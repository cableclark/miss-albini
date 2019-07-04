// Current paginated page number;
var pageNumber = 1;

// Last paginated page;
var lastPage  = 0;

// Element in which data is redenred;
var div = $(".results");

// Ajax response data;
var data;

$(document).ready(function () {
    getData();
})


$(window).scroll(function () {

    hasReachedTheBottom();
})

//Checks if the user has scrolled to the bottom of the page;
function hasReachedTheBottom() {
    if($(window).scrollTop( ) +  $(window).height() == $(document).height()) {

        checkForLastPage();

        getData();
    }
}

// Checks if we have reached last paginated page;
function checkForLastPage () {

    pageNumber++;

    if(pageNumber >= lastPage ) {
        return;
    }
}
// Checks if the last paginated page has been set as a varible, so it does't have to set it on each Ajax call;
function checkIfLastPageIsSet (response) {

    if ( lastPage  > 0 ) {
        return;

    }  else {
        lastPage = response.last_page + 1;
    }
}


//Makes the ajax call, duh;
function getData () {

       addLoadingToDOM ()

       runAjax();

}
// Self-explanatory, eh?;
function runAjax () {

    $.ajax ({
        url:"/load?page=" + pageNumber,
        method: "GET",
        success: function (response) {

            renderHTML(response);
            removeLoadingFromDOM ();
            checkIfLastPageIsSet (response);

            }
        })
}

// You custumize the way the data gets rendered on the DOM here ;
function renderHTML (response) {

    data = response.data;

    data.forEach(function(element) {

        div.append('<a href="posts/'+element.id +'"><h2>' + element.title + "</h2></a>");

        div.append("<p>" + element.body+ "</p>");
    });

}

//This two functions are used for the loading "animation"

function addLoadingToDOM () {

    div.append('<p class="load"> Loading...> </p>' ); 

}

function removeLoadingFromDOM () {

    $(".load" ).remove();

}
