let ul = document.querySelector('ul'),
    closemenu = document.querySelector('.closemenu'),
    openmenu = document.querySelector('.openmenu');
    

    

openmenu.onclick = function (){
   
    ul.classList.toggle("mainmenu");
};

closemenu.onclick = function(){
    
    this.parentElement.classList.remove("mainmenu");

};
document.onkeyup = function(e){
    console.log(e);
}

let lA1 = document.querySelector(".m-i1 a"),
    lA2 = document.querySelector(".m-i2 a"),
    lA3 = document.querySelector(".m-i3 a"),
    lA4 = document.querySelector(".m-i4 a"),
    lA5 = document.querySelector(".m-i5 a");

    (lA1.onclick = () => {
        lA1.classList.add("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active") ,ul.classList.remove("mainmenu");
    }),
        (lA2.onclick = () => {
            lA1.classList.remove("Active"), lA2.classList.add("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active") , ul.classList.remove("mainmenu");
        }),
        (lA3.onclick = () => {
            lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.add("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"), ul.classList.remove("mainmenu");
        }),
        (lA4.onclick = () => {
            lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.add("Active"), lA5.classList.remove("Active"), ul.classList.remove("mainmenu");
        }),
        (lA5.onclick = () => {
            lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.add("Active"), ul.classList.remove("mainmenu");
        });
       
        let
    fr1 = document.querySelector(".fr-1"),
    fr2 = document.querySelector(".fr-2"),
    fr3 = document.querySelector(".fr-3"),
    fr4 = document.querySelector(".fr-4"),
    fr5 = document.querySelector("footer");
console.log(fr2.offsetTop),
    console.log(fr3.offsetTop),
    (window.onscroll = function () {
        var e = window.pageYOffset;
        fr1.offsetTop;
        e < 355 && (lA1.classList.add("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        var t = fr2.offsetTop;
        t < e && e < t + fr2.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.add("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        t = fr3.offsetTop;
        t < e && e < t + fr3.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.add("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        t = fr4.offsetTop;
        t < e && e < t + fr4.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.add("Active"), lA5.classList.remove("Active")),
            fr5.offsetTop - 355 < e && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.add("Active"));
    });

  
    

       