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
    "Suite à l'obtention du CDA ( Concepteur Développeur d'Applications, <br>\
        NIVEAU BAC+3/4 ) à l'AFPA d'Amiens."," Admis en Pré-MSC chez EPITECH Paris, \
        je souhaiterais apprendre la cybersécurité en ayant aucune expérience,\
        c'est pour cela que je suis à la recherche d'une entreprise qui pourrait\
        me former à partir de Janvier 2024. <br>\
        Fréquence 3 jours entreprise par semaine.\
        Motivé et prêt à apprendre énormement avec vous "],

    typeSpeed: 70,
    backSpeed: 40,
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