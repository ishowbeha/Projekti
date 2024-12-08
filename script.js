
    
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
   
    var j = 0; 
    var imgArray2 = [
        "photoSlider1.jpg",
        "photoSlider2.jpg",
        "photoSlider3.jpg",
        "photoSlider4.jpg",
        "photoSlider5.jpg"
    ];
    
  
    function ndrroSlider() {
        document.getElementById("slider-imazh").src = imgArray2[j]; 
        if (j < imgArray.length - 1) {
            j++; 
        } else {
            j= 0; 
        }
    }
    
   
    setInterval(ndrroSlider, 1500);