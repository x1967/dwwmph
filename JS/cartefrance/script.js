$(function() {
    $('[id*=region_').on('click', function() {

        // region sur laquelle on clique
        let region = $(this);

        let regionId = $(this)["0"].id;
        let allRegion = $('[id*=region_');


        // lors du clic toutes les régions deviennent blanche, 
        // ensuite la région clicquée devient verte

        allRegion.css('fill', '#fff');
        region.css('fill', '#008000');

        // on coupe la partie region_ de l' id
        regionId = regionId.replace('region_', 'région ');

        console.log(regionId)



        let boucle = true;
        do {
            regionId = regionId.replace('_', ' ');

            // Si on trouve un underscore=-1, on arrête la boucle
            if ((regionId.indexOf('_')) == -1)
                boucle = false;

        } while (boucle);


        $('#infosRegion').text(regionId);

        console.log(regionId);
    });

})