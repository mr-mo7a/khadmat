let hd = document.querySelector("header"),
    btn = document.querySelector("header button"),
    btnI = document.querySelector("header button i"),
    ulist = document.querySelector("header ul"),
    aContact = document.querySelector("header a.btn-contact"),
    dropM = document.querySelector(".drop-m"),
    dropMA = document.querySelector(".drop-m a"),
    dropMI = document.querySelector(".drop-m i"),
    dropS = document.querySelector(".m-ser");
btn.onclick = function () {
    hd.classList.toggle("open-hd"), ulist.classList.toggle("hid-f"), aContact.classList.toggle("hid-b");
};
let lA1 = document.querySelector(".m-i1 a"),
    lA2 = document.querySelector(".m-i2 a"),
    lA3 = document.querySelector(".m-i3 a"),
    lA4 = document.querySelector(".m-i4 a"),
    lA5 = document.querySelector(".m-i5 a");
(lA1.onclick = () => {
    lA1.classList.add("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active");
}),
    (lA2.onclick = () => {
        lA1.classList.remove("Active"), lA2.classList.add("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active");
    }),
    (lA3.onclick = () => {
        lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.add("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active");
    }),
    (lA4.onclick = () => {
        lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.add("Active"), lA5.classList.remove("Active");
    }),
    (lA5.onclick = () => {
        lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.add("Active");
    }),
    document.addEventListener("click", (e) => {
        e.target !== btn &&
            e.target !== hd &&
            e.target !== btnI &&
            e.target !== dropM &&
            e.target !== dropS &&
            e.target !== dropMA &&
            e.target !== dropMI &&
            hd.classList.contains("open-hd") &&
            (hd.classList.remove("open-hd"), ulist.classList.remove("hid-f"), aContact.classList.remove("hid-b"));
    });
let fr1 = document.querySelector(".fr-1"),
    fr2 = document.querySelector(".fr-2"),
    fr3 = document.querySelector(".fr-3"),
    fr4 = document.querySelector(".fr-4"),
    fr5 = document.querySelector("footer");
console.log(fr2.offsetTop),
    console.log(fr3.offsetTop),
    (window.onscroll = function () {
        var e = window.pageYOffset;
        fr1.offsetTop;
        e < 350 && (lA1.classList.add("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        var t = fr2.offsetTop;
        t < e && e < t + fr2.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.add("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        t = fr3.offsetTop;
        t < e && e < t + fr3.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.add("Active"), lA4.classList.remove("Active"), lA5.classList.remove("Active"));
        t = fr4.offsetTop;
        t < e && e < t + fr4.offsetHeight && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.add("Active"), lA5.classList.remove("Active")),
            fr5.offsetTop - 350 < e && (lA1.classList.remove("Active"), lA2.classList.remove("Active"), lA3.classList.remove("Active"), lA4.classList.remove("Active"), lA5.classList.add("Active"));
    });
