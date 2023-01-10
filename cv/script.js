// NAVBAR
let lastScrollTop = 0;
navbar = document.getElementById("navbar");

window.addEventListener('scroll', function(){
    const scrollTop = window.pageTOffset ||
    this.document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        navbar.style.top='-50px';
    } else {
        navbar.style.top='0';
    }
    lastScrollTop = scrollTop;
});

// typed 

var typed = new Typed('.typed', {
    strings: ["Je me présente Mohamed El korchi.", 
    "Actuellement en cours de formation CDA (\
        Concepteur Développeur d'Application,\
        NIVEAU BAC+4 ) à l'AFPA."," <br> Je suis à la \
        recherche d'un stage au sein d'une \
        entreprise qui pourrait m'apprendre le métier\
        de développeur pour approfondir mes\
        compétences et de nouveaux langages. <br>\
        Le but étant de valider ma formation,\
        apprendre en entreprise avec des\
        développeurs compétent pour devenir assez\
        autonome et postuler pour un CDI"],
    typeSpeed: 50,
    backSpeed: 80,
    //smartBackspace:true, // this is a default
    loop: false
    
  });


  // COMPTEUR FORMATION

  let compteur = 0;

  $(window).scroll(function(){

    const top = $(".counter").offset().top -
    window.innerHeight;

    if (compteur == 0 && $(window).scrollTop()>top){
        $(".counter-value").each(function(){
            let $this = $(this),
                countTo = $this.attr("data-count");
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            },
            {
                duration : 5000,
                easing: "swing",
                step: function(){
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });    
        });
        compteur =1;
    }
  })


  //////////// AOS 
  
  AOS.init();