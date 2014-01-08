/*$(function() {


    $( ".menu > li > a" ).each(function() {
        var wrapper = $(this).next('ul');
        $(this).parent('li').hover(
            function () {
                wrapper.slideDown();
            },
            function () {
                wrapper.slideUp();
            }
        );
    });

});*/


function autocompleteInputs(idInput, name, etype, location, street, city, place) {
    //var place;
    var input = /** @type {HTMLInputElement} */(document.getElementById(idInput));
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', listener);

    function listener() {
        place = autocomplete.getPlace();
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
        name.val(null);
        etype.val(null);
        location.val(null);
        street.val(null);
        city.val(null);

        for(var i=0; i<place.address_components.length; ++i) {
            switch(place.address_components[i].types[0]) {
                case 'route':
                    street.val(place.address_components[i].long_name);
                    break;
                case 'locality':
                    city.val(place.address_components[i].long_name);
                    break;
            }
            if(place.types[place.types.length-1] == "establishment") {
                name.val(place.name);
                var type = place.types[0];
                etype.val(type);

                if(type == "night_club" || type == "bar") {
                    $('option[value="night_club"]').prop('selected', 'selected');
                } else if (type == "university") {
                    $('option[value="university"]').prop('selected', 'selected');
                } else if (type == "school") {
                    $('option[value="school"]').prop('selected', 'selected');
                } else if (type == "restaurant" || type == "food") {
                    $('option[value="restaurant"]').prop('selected', 'selected');
                } else if (type == "lodging") {
                    $('option[value="lodging"]').prop('selected', 'selected');
                }
            } else {
                $('option').first().prop({
                    'disabled': 'disabled',
                    'selected': 'selected'
                });
            }
        }
        if(place.geometry.location) {
            location.val(place.geometry.location.nb + ", " + place.geometry.location.ob);
            //console.log(place); OK
        }
    }
}