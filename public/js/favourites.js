$(document).ready(function() {
    //when user selects heart button of a food
    $(".heart-btn").on("click", function() {
        var food_id = $(this).data("id");
        // alert(food_id);

        $fav_icon = $(this);

        //when you click once you'll add to favs. click again, you'll remove from favs
        if ($fav_icon.hasClass("far fa-heart")) {
            action = "add";
        } else if ($fav_icon.hasClass("fas fa-heart")) {
            action = "remove";
        }
        $.ajax({
            data: {
                action: action,
                food_id: food_id,
            },
            type: "post",
            url: "http://localhost/cafe99/customer_controller/fav_submit",

            success: function(data) {
                // console.log(data);
                var res = JSON.parse(data);
                if (res.action) {
                    if (action == "add") {
                        $fav_icon.removeClass("far fa-heart");
                        $fav_icon.addClass("fas fa-heart");
                    } else if (action == "remove") {
                        $fav_icon.removeClass("fas fa-heart");
                        $fav_icon.addClass("far fa-heart");
                    }
                }
                // alert(res.msg);
            },
        });
        // alert('something');
    });
});