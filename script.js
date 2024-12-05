
    
    var i = 0;
    var imgArray = [
        "foto1.avif",
        "foto2.jpg",
        "foto3.jpg",
        "foto4.jpg",
        "foto6.avif"
    ];

    function ndrroImg() {
   
        document.getElementById('slideshow').src = imgArray[i];
ari
        if (i < imgArray.length - 1) {
            i ++;
        } else {
            i=0; 
        }
    }
    document.body.addEventListener('load', ndrroImg());
    

    function scrollToSlider() {
        document.getElementById('kontenti').scrollIntoView({ behavior: 'smooth' });
    }
   

