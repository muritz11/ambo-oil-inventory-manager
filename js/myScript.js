

var path = window.location.href;
var toggleStock = false;
var toggleTable = false;
var msg = $('.msg');
var msgH5 = $('#msgH5');
var loader = $('#loader');
var primary = $('.main-content');


function showPage() {
    loader.hide('fast');
    primary.show('slow');
    // console.log('page shown');
}

// function loaderAnime() {
//     setTimeout(showPage, 100);
// }

// window.onload = loaderAnime();



//had to write same function twice cos d toggle variable of one was affecting the other
function rotStock() {
    var angle = $('#stockAngle');
    if(!toggleStock){
        angle.css({'transform': 'rotate(90deg)'});
        toggleStock = true;
    } else {
        angle.css({'transform': 'rotate(0deg)'});
        toggleStock = false;
    }
}

function rotTable() {
    var angle = $('#tableAngle');
    if(!toggleTable){
        angle.css({'transform': 'rotate(90deg)'});
        toggleTable = true;
    } else {
        angle.css({'transform': 'rotate(0deg)'});
        toggleTable = false;
    }
}


function accessibility() {

    var curUser = $('#user').text();
    if (curUser !== 'Admin') {

        $('.hide').hide();

    }

}


$(document).ready(function () {

    setTimeout( showPage, 500 );

    //expands sidebar collapsible /stock update/
    if (path.match(/receive/g) == 'receive' || path.match(/supply/g) == 'supply'){

        $('#collapseStock').slideToggle();
        rotStock();

    }

    //expands sidebar collapsible /tables/
    if (path.match(/monthly/g) == 'monthly' || path.match(/outstanding/g) == 'outstanding'){

        $('#collapseTable').slideToggle();
        rotTable();

    }


    //run admin accessibility function
    accessibility();

    //drop down menu
    $('#userDropdown').click(function () {
        $('.dropdown-menu').toggle();
    });


    //log out
    $('#logOut').click(function (e) {
        var logOut = confirm('Are you sure you want to Log Out?');

        if (!logOut){
            e.preventDefault();
        }
    });


    // collapse/expand sidebar expandable items
    $('#collapsedStock').click(function () {
        $('#collapseStock').slideToggle();
        rotStock();
    });

    $('#collapsedTable').click(function () {
        $('#collapseTable').slideToggle();
        rotTable();
    });


    //order data table
    $('#my_table').DataTable( { "order": [[ 0, "desc"]] } )



    //login message
    if (msgH5.text() === ''){
        msg.hide();
    } else {
        msg.show('slow');
        msg.animate({top: '0px', opacity:0.95}, "slow");
        msg.animate({top: '10px'}, "slow");
        setTimeout(function () {
            msg.hide('slow');
        }, 3000);

        $.ajax({
            url:'assets/php/session_start.php',
            method: 'POST',
            data: { clrSession: 'yes' },
            success: function(data) {

                if (data == 'ok'){
                    console.log('session cleared');
                }else{
                    console.log(data);
                }

            }
            // error: function (resp) {
            //     console.log('something went wrong');
            //     alert("Sorry, an error occurred while trying to clear session: "+resp.status+" "+resp.statusText);
            // }

        })

    }




});


/*   dropdown menu      */
$('.dropdown-item').mouseenter(function () {
    $(this).css('color', '#5D5F60');
});

$('.dropdown-item').mouseleave(function () {
    $(this).css('color', 'white');
});

$('.navbar-nav').mouseenter(function () {
    $('#drpa').show();
});

$('.navbar-nav').mouseleave(function () {
    $('#drpa').hide();
});


