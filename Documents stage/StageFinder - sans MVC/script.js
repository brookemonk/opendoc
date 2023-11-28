function ClickShowHideMenu(id) {
    this.box2Hover = true;
    this.highlightActive = false;

    this.init = function () {
        if (!document.getElementById(this.id)) {
            alert("Element '" + this.id + "' does not exist in this document. ClickShowHideMenu cannot be initialized");
            return;
        }
        this.parse(document.getElementById(this.id).childNodes, this.tree, this.id);
        this.load();
        if (window.attachEvent) {
            window.attachEvent("onunload", function (e) { self.save(); });
        } else if (window.addEventListener) {
            window.addEventListener("unload", function (e) { self.save(); }, false);
        }
    }

    this.parse = function (nodes, tree, id) {
        for (var i = 0; i < nodes.length; i++) {
            if (nodes[i].nodeType != 1) {
                continue;
            }

            if (nodes[i].className) {
                if ("box1" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box1over("' + nodes[i].id + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box1out("' + nodes[i].id + '"); }');
                    eval('nodes[i].onclick = function() { self.box1click("' + nodes[i].id + '"); }');
                }

                if ("box3" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box3over("' + nodes[i].id + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box3out("' + nodes[i].id + '"); }');
                    eval('nodes[i].onclick = function() { self.box3click("' + nodes[i].id + '"); }');
                }

                if ("box4" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box4over("' + nodes[i].id + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box4out("' + nodes[i].id + '"); }');
                    eval('nodes[i].onclick = function() { self.box4click("' + nodes[i].id + '"); }');
                }

                if ("box5" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box5over("' + nodes[i].id + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box5out("' + nodes[i].id + '"); }');
                    eval('nodes[i].onclick = function() { self.box5click("' + nodes[i].id + '"); }');
                }

                if ("box6" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box6over("' + nodes[i].id + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box6out("' + nodes[i].id + '"); }');
                    eval('nodes[i].onclick = function() { self.box6click("' + nodes[i].id + '"); }');
                }

                if ("section" == nodes[i].className) {
                    id = id + "-" + (tree.length - 1);
                    nodes[i].id = id + "-section";
                    tree = tree[tree.length - 1];
                }

                if ("box2" == nodes[i].className.substr(0, 4)) {
                    nodes[i].id = id + "-" + tree.length;
                    tree[tree.length] = new Array();
                    eval('nodes[i].onmouseover = function() { self.box2over("' + nodes[i].id + '", "' + nodes[i].className + '"); }');
                    eval('nodes[i].onmouseout = function() { self.box2out("' + nodes[i].id + '", "' + nodes[i].className + '"); }');
                }
            }

            if (this.highlightActive && nodes[i].tagName && nodes[i].tagName == "A") {
                if (document.location.href == nodes[i].href) {
                    nodes[i].className = (nodes[i].className ? ' active' : 'active')
                }
            }

            if (nodes[i].childNodes) {
                this.parse(nodes[i].childNodes, tree, id);
            }
        }
    }

    this.box1over = function (id) {
        if (!this.box1Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox1 == id ? "box1-open-hover" : "box1-hover");
    }

    this.box3over = function (id) {
        if (!this.box3Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox3 == id ? "box3-open-hover" : "box3-hover");
    }

    this.box4over = function (id) {
        if (!this.box4Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox4 == id ? "box4-open-hover" : "box4-hover");
    }

    this.box5over = function (id) {
        if (!this.box5Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox5 == id ? "box5-open-hover" : "box5-hover");
    }

    this.box6over = function (id) {
        if (!this.box6Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox6 == id ? "box6-open-hover" : "box6-hover");
    }

    this.box1out = function (id) {
        if (!this.box1Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox1 == id ? "box1-open" : "box1");
    }

    this.box3out = function (id) {
        if (!this.box3Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox3 == id ? "box3-open" : "box3");
    }

    this.box4out = function (id) {
        if (!this.box4Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox4 == id ? "box4-open" : "box4");
    }

    this.box5out = function (id) {
        if (!this.box5Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox5 == id ? "box5-open" : "box5");
    }

    this.box6out = function (id) {
        if (!this.box6Hover) return;
        if (!document.getElementById(id)) return;
        document.getElementById(id).className = (this.id_openbox6 == id ? "box6-open" : "box6");
    }

    this.box1click = function (id) {
        if (!document.getElementById(id)) {
            return;
        }
        var id_openbox1 = this.id_openbox1;
        var el = document.getElementById(id);
        var element = document.getElementById("click-menu1-0-section");

        if (this.id_openbox1 === id) {
            if (el.classList.contains("box1-open")) {
                el.classList.remove("box1-open");
                el.classList.add("box1");
                element.style.display = "none";
                document.getElementById("img_1").style.transform = "rotate(0deg)";
            }
            this.id_openbox1 = null;
            return;
        }
        if (id_openbox1) {
            var prevEl = document.getElementById(id_openbox1);
            prevEl.classList.remove("box1-open-hover");
            prevEl.classList.add("box1");
            element.style.display = "none";
            document.getElementById("img_1").style.transform = "rotate(0deg)";
        }

        if (id_openbox1 != id) {
            this.show(id);
            var className = document.getElementById(id).className;
            if ("box1" == className) {
                document.getElementById(id).className = "box1-open";
                document.getElementById("img_1").style.transform = "rotate(180deg)";
            }
        }

        el.classList.remove("box1");
        el.classList.add("box1-open");
        this.id_openbox1 = id;
    }

    this.box3click = function (id) {
        if (!document.getElementById(id)) {
            return;
        }
        var id_openbox3 = this.id_openbox3;
        var el = document.getElementById(id);
        var element = document.getElementById("click-menu1-1-section");

        if (this.id_openbox3 === id) {
            if (el.classList.contains("box3-open")) {
                el.classList.remove("box3-open");
                el.classList.add("box3");
                element.style.display = "none";
                document.getElementById("img_2").style.transform = "rotate(0deg)";
            }
            this.id_openbox3 = null;
            return;
        }
        if (id_openbox3) {
            var prevEl = document.getElementById(id_openbox3);
            prevEl.classList.remove("box3-open-hover");
            prevEl.classList.add("box3");
            element.style.display = "none";
            document.getElementById("img_2").style.transform = "rotate(0deg)";
        }

        if (id_openbox3 != id) {
            this.show(id);
            var className = document.getElementById(id).className;
            if ("box3" == className) {
                document.getElementById(id).className = "box3-open";
                document.getElementById("img_2").style.transform = "rotate(180deg)";
            }
        }

        el.classList.remove("box3");
        el.classList.add("box3-open");
        this.id_openbox3 = id;
    }

    this.box4click = function (id) {
        if (!document.getElementById(id)) {
            return;
        }
        var id_openbox4 = this.id_openbox4;
        var el = document.getElementById(id);
        var element = document.getElementById("click-menu1-2-section");

        if (this.id_openbox4 === id) {
            if (el.classList.contains("box4-open")) {
                el.classList.remove("box4-open");
                el.classList.add("box4");
                element.style.display = "none";
                document.getElementById("img_3").style.transform = "rotate(0deg)";
            }
            this.id_openbox4 = null;
            return;
        }
        if (id_openbox4) {
            var prevEl = document.getElementById(id_openbox4);
            prevEl.classList.remove("box4-open-hover");
            prevEl.classList.add("box4");
            element.style.display = "none";
            document.getElementById("img_3").style.transform = "rotate(0deg)";
        }

        if (id_openbox4 != id) {
            this.show(id);
            var className = document.getElementById(id).className;
            if ("box4" == className) {
                document.getElementById(id).className = "box4-open";
                document.getElementById("img_3").style.transform = "rotate(180deg)";
            }
        }

        el.classList.remove("box4");
        el.classList.add("box4-open");
        this.id_openbox4 = id;
    }

    this.box5click = function (id) {
        if (!document.getElementById(id)) {
            return;
        }
        var id_openbox5 = this.id_openbox5;
        var el = document.getElementById(id);
        var element = document.getElementById("click-menu1-3-section");

        if (this.id_openbox5 === id) {
            if (el.classList.contains("box5-open")) {
                el.classList.remove("box5-open");
                el.classList.add("box5");
                element.style.display = "none";
                document.getElementById("img_4").style.transform = "rotate(0deg)";
            }
            this.id_openbox5 = null;
            return;
        }
        if (id_openbox5) {
            var prevEl = document.getElementById(id_openbox5);
            prevEl.classList.remove("box5-open-hover");
            prevEl.classList.add("box5");
            element.style.display = "none";
            document.getElementById("img_4").style.transform = "rotate(0deg)";
        }

        if (id_openbox5 != id) {
            this.show(id);
            var className = document.getElementById(id).className;
            if ("box5" == className) {
                document.getElementById(id).className = "box5-open";
                document.getElementById("img_4").style.transform = "rotate(180deg)";
            }
        }

        el.classList.remove("box5");
        el.classList.add("box5-open");
        this.id_openbox5 = id;
    }

    this.box6click = function (id) {
        if (!document.getElementById(id)) {
            return;
        }
        var id_openbox6 = this.id_openbox6;
        var el = document.getElementById(id);
        var element = document.getElementById("click-menu1-4-section");

        if (this.id_openbox6 === id) {
            if (el.classList.contains("box6-open")) {
                el.classList.remove("box6-open");
                el.classList.add("box6");
                element.style.display = "none";
                document.getElementById("img_5").style.transform = "rotate(0deg)";
            }
            this.id_openbox6 = null;
            return;
        }
        if (id_openbox6) {
            var prevEl = document.getElementById(id_openbox6);
            prevEl.classList.remove("box6-open-hover");
            prevEl.classList.add("box6");
            document.getElementById("img_5").style.transform = "rotate(0deg)";
        }

        if (id_openbox6 != id) {
            this.show(id);
            var className = document.getElementById(id).className;
            if ("box6" == className) {
                document.getElementById(id).className = "box6-open";
                document.getElementById("img_5").style.transform = "rotate(180deg)";
            }
        }

        el.classList.remove("box6");
        el.classList.add("box6-open");
        this.id_openbox6 = id;
    }

    this.show = function (id) {
        if (document.getElementById(id + "-section")) {
            document.getElementById(id + "-section").style.display = "block";
            this.id_openbox1 = id;
        }
    }

    this.show = function (id) {
        if (document.getElementById(id + "-section")) {
            document.getElementById(id + "-section").style.display = "block";
            this.id_openbox3 = id;
        }
    }

    this.show = function (id) {
        if (document.getElementById(id + "-section")) {
            document.getElementById(id + "-section").style.display = "block";
            this.id_openbox4 = id;
        }
    }

    this.show = function (id) {
        if (document.getElementById(id + "-section")) {
            document.getElementById(id + "-section").style.display = "block";
            this.id_openbox5 = id;
        }
    }

    this.show = function (id) {
        if (document.getElementById(id + "-section")) {
            document.getElementById(id + "-section").style.display = "block";
            this.id_openbox6 = id;
        }
    }

    this.hide = function () {
        document.getElementById(this.id_openbox1 + "-section").style.display = "none";
        this.id_openbox1 = "";
    }

    this.hide = function () {
        document.getElementById(this.id_openbox3 + "-section").style.display = "none";
        this.id_openbox3 = "";
    }

    this.hide = function () {
        document.getElementById(this.id_openbox3 + "-section").style.display = "none";
        this.id_openbox4 = "";
    }

    this.hide = function () {
        document.getElementById(this.id_openbox3 + "-section").style.display = "none";
        this.id_openbox5 = "";
    }

    this.hide = function () {
        document.getElementById(this.id_openbox3 + "-section").style.display = "none";
        this.id_openbox6 = "";
    }

    this.save = function () {
        if (this.id_openbox1) {
            this.cookie.set(this.id, this.id_openbox1);
        }
        if (this.id_openbox3) {
            this.cookie.set(this.id, this.id_openbox3);
        }
        if (this.id_openbox4) {
            this.cookie.set(this.id, this.id_openbox4);
        }
        if (this.id_openbox5) {
            this.cookie.set(this.id, this.id_openbox5);
        }
        if (this.id_openbox6) {
            this.cookie.set(this.id, this.id_openbox6);
        }
        else {
            this.cookie.del(this.id);
        }
    }

    this.load = function () {
        var id_openbox1 = this.cookie.get(this.id);
        var id_openbox3 = this.cookie.get(this.id);
        var id_openbox4 = this.cookie.get(this.id);
        var id_openbox5 = this.cookie.get(this.id);
        var id_openbox6 = this.cookie.get(this.id);
        if (id_openbox1) {
            this.show(id_openbox1);
            document.getElementById(id_openbox1).className = "box1-open";
        }
        if (id_openbox3) {
            this.show(id_openbox3);
            document.getElementById(id_openbox3).className = "box3-open";
        }
        if (id_openbox4) {
            this.show(id_openbox4);
            document.getElementById(id_openbox4).className = "box4-open";
        }
        if (id_openbox5) {
            this.show(id_openbox5);
            document.getElementById(id_openbox5).className = "box5-open";
        }
        if (id_openbox6) {
            this.show(id_openbox6);
            document.getElementById(id_openbox6).className = "box6-open";
        }
    }

    function Cookie() {
        this.get = function (name) {
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var a = cookies[i].split("=");
                if (a.length == 2) {
                    a[0] = a[0].trim();
                    a[1] = a[1].trim();
                    if (a[0] == name) {
                        return unescape(a[1]);
                    }
                }
            }
            return "";
        }
        this.set = function (name, value) {
            document.cookie = name + "=" + escape(value);
        }
        this.del = function (name) {
            document.cookie = name + "=; expires=Thu, 01-Jan-70 00:00:01 GMT";
        }
    }

    var self = this;
    this.id = id;
    this.tree = new Array();
    this.cookie = new Cookie();
    this.id_openbox = "";
}

if (typeof String.prototype.trim == "undefined") {
    String.prototype.trim = function () {
        var s = this.replace(/^\s*/, "");
        return s.replace(/\s*$/, "");
    }
}

// Slide bar for the menu //

function openMenu() {
    document.getElementById('sideMenuTuteur').style.marginRight = '0';
}

function closeMenu() {
    document.getElementById('sideMenuTuteur').style.marginRight = '-250px';
}




// ////////////////////////////////////////////////////
// main carrousel

let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("carousel")[0].children;
    const dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 7000); // Change image every 7 seconds
}

const dots = document.getElementsByClassName("dot");
for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener("click", function () {
        const slides = document.getElementsByClassName("carousel")[0].children;
        const currentSlide = document.querySelector(".carousel img[style*='display: block']");
        const currentIndex = Array.prototype.indexOf.call(slides, currentSlide);
        slides[currentIndex].style.display = "none";
        dots[currentIndex].classList.remove("active");
        slideIndex = i + 1;
        slides[i].style.display = "block";
        dots[i].classList.add("active");
    });
}

//second courrousel
let slideIndexbis = 0;
showSlidesbis();

function showSlidesbis() {
    let i;
    const slidesbis = document.getElementsByClassName("carouselbis")[0].children;
    const dotsbis = document.getElementsByClassName("dotbis");
    for (i = 0; i < slidesbis.length; i++) {
        slidesbis[i].style.display = "none";
    }
    slideIndexbis++;
    if (slideIndexbis > slidesbis.length) { slideIndexbis = 1 }
    for (i = 0; i < dotsbis.length; i++) {
        dotsbis[i].className = dotsbis[i].className.replace(" active", "");
    }
    slidesbis[slideIndexbis - 1].style.display = "block";
    dotsbis[slideIndexbis - 1].className += " active";
    // setTimeout(showSlidesbis, 7000); // Change image every 7 seconds
}

const dotsbis = document.getElementsByClassName("dotbis");
for (let i = 0; i < dotsbis.length; i++) {
    dotsbis[i].addEventListener("click", function () {
        const slidesbis = document.getElementsByClassName("carouselbis")[0].children;
        const currentSlidebis = document.querySelector(".carouselbis img[style*='display: block']");
        const currentIndexbis = Array.prototype.indexOf.call(slidesbis, currentSlidebis);
        slidesbis[currentIndexbis].style.display = "none";
        dotsbis[currentIndexbis].classList.remove("active");
        slideIndexbis = i + 1;
        slidesbis[i].style.display = "block";
        dotsbis[i].classList.add("active");
    });
}