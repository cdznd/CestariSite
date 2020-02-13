$(document).ready(function(){

    buildMap();

});

    var sw = document.body.clientWidth,
        bp = 550,
        $map = $('.map');
    var static = "https://maps.google.com/maps/api/staticmap?center=55.7402023,12.5341835&zoom=13&markers=55.7402023,12.5341835&size=640x320&sensor=true";
    var embed = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.5667944995253!2d-49.27106278441862!3d-25.41930763869678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dce419f5ff8ce1%3A0xfaa5e26f29e2c2d2!2sAv.%20C%C3%A2ndido%20de%20Abreu%20-%20Centro%20C%C3%ADvico%2C%20Curitiba%20-%20PR%2C%2082590-300!5e0!3m2!1spt-BR!2sbr!4v1574037161874!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;display:block"></iframe>';

    function buildMap() {
    if(sw>bp) { //If Large Screen
        if($('.map-container').length < 1) { //If map doesn't already exist
            buildEmbed();
        }
    } else {
        if($('.static-img').length < 1) { //If static image doesn't exist
            buildStatic();
        }
    }
    };

    function buildEmbed() { //Build iframe view
        $('<div class="map-container"/>').html(embed).prependTo($map);
    };
    
    function buildStatic() { //Build static map
    var mapLink = $('.map-link').attr('href'),
        $img = $('<img class="static-img" />').attr('src',static);
    $('<a/>').attr('href',mapLink).html($img).prependTo($map); 
    }

    $(window).resize(function() {
    sw = document.body.clientWidth;
    buildMap();
    google.maps.event.trigger(map, "resize");
        
    });