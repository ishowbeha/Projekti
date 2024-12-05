
    // Inicializo variablin i për indeksin dhe array-n e imazheve
    var i = 0;
    var imgArray = [
        "foto1.avif",
        "foto2.jpg",
        "foto3.jpg",
        "foto4.jpg",
        "foto6.avif"
    ];

    function ndrroImg() {
        // Përditëso burimin e imazhit me indeksin aktual
        document.getElementById('slideshow').src = imgArray[i];

        // Nëse është imazhi i fundit, kthehu te i pari
        if (i < imgArray.length - 1) {
            i ++;; // Kthehu te fillimi
        } else {
            i=0; // Kalon te imazhi tjetër
        }
    }
    document.body.addEventListener('load', ndrroImg());
    // Sigurohu që slider-i të ngarkohet te imazhi i parë në fillim
   

