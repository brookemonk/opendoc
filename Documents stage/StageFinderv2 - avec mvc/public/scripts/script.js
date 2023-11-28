var tree = new Array();
var id = "click-menu1";

this.id_openbox1 = null;
this.id_openbox3 = null;
this.id_openbox4 = null;
this.id_openbox5 = null;
this.id_openbox6 = null;


this.show = function(id) {
    var element = document.getElementById(id);
    if (element) {
        element.style.display = "block";
    }
};

var nodes = document.getElementById(id).getElementsByTagName("*");
for (var i = 0; i < nodes.length; i++) {
    if (nodes[i].nodeType != 1) {
        continue;
    }

    if (nodes[i].className) {
        if ("box1" == nodes[i].className.substr(0, 4)) {
            nodes[i].id = id + "-" + tree.length;
            tree[tree.length] = new Array();
            eval('nodes[i].onclick = function() { self.box1click("' + nodes[i].id + '"); }');
        }
    }

    if (nodes[i].className) {
        if ("box3" == nodes[i].className.substr(0, 4)) {
            nodes[i].id = id + "-" + tree.length;
            tree[tree.length] = new Array();
            eval('nodes[i].onclick = function() { self.box3click("' + nodes[i].id + '"); }');
        }
    }

    if (nodes[i].className) {
        if ("box4" == nodes[i].className.substr(0, 4)) {
            nodes[i].id = id + "-" + tree.length;
            tree[tree.length] = new Array();
            eval('nodes[i].onclick = function() { self.box4click("' + nodes[i].id + '"); }');
        }
    }

    if (nodes[i].className) {
        if ("box5" == nodes[i].className.substr(0, 4)) {
            nodes[i].id = id + "-" + tree.length;
            tree[tree.length] = new Array();
            eval('nodes[i].onclick = function() { self.box5click("' + nodes[i].id + '"); }');
        }
    }

    if (nodes[i].className) {
        if ("box6" == nodes[i].className.substr(0, 4)) {
            nodes[i].id = id + "-" + tree.length;
            tree[tree.length] = new Array();
            eval('nodes[i].onclick = function() { self.box6click("' + nodes[i].id + '"); }');
        }
    }
}

this.box1click = function (id) {
    if (!document.getElementById(id)) {
        return;
    }
    var el = document.getElementById(id);
    var box2 = el.nextElementSibling;

    if (this.id_openbox1 === id) {
        if (el.classList.contains("box1-open")) {
            el.classList.remove("box1-open");
            el.classList.add("box1");
            document.getElementById("img_1").style.transform = "rotate(0deg)";
            box2.style.display = "none";
        }
        this.id_openbox1 = null;
        return;
    }

    this.show(id);

    el.classList.remove("box1");
    el.classList.add("box1-open");
    document.getElementById("img_1").style.transform = "rotate(180deg)";
    box2.style.display = "block";

    this.id_openbox1 = id;
};

this.box3click = function (id) {
    if (!document.getElementById(id)) {
        return;
    }
    var el = document.getElementById(id);
    var box2 = el.nextElementSibling;

    if (this.id_openbox3 === id) {
        if (el.classList.contains("box3-open")) {
            el.classList.remove("box3-open");
            el.classList.add("box3");
            document.getElementById("img_2").style.transform = "rotate(0deg)";
            box2.style.display = "none";
        }
        this.id_openbox3 = null;
        return;
    }

    this.show(id);

    el.classList.remove("box3");
    el.classList.add("box3-open");
    document.getElementById("img_2").style.transform = "rotate(180deg)";
    box2.style.display = "block";

    this.id_openbox3 = id;
};

this.box4click = function (id) {
    if (!document.getElementById(id)) {
        return;
    }
    var el = document.getElementById(id);
    var box2 = el.nextElementSibling;

    if (this.id_openbox4 === id) {
        if (el.classList.contains("box4-open")) {
            el.classList.remove("box4-open");
            el.classList.add("box4");
            document.getElementById("img_3").style.transform = "rotate(0deg)";
            box2.style.display = "none";
        }
        this.id_openbox4 = null;
        return;
    }

    this.show(id);

    el.classList.remove("box4");
    el.classList.add("box4-open");
    document.getElementById("img_3").style.transform = "rotate(180deg)";
    box2.style.display = "block";

    this.id_openbox4 = id;
};

this.box5click = function (id) {
    if (!document.getElementById(id)) {
        return;
    }
    var el = document.getElementById(id);
    var box2 = el.nextElementSibling;

    if (this.id_openbox5 === id) {
        if (el.classList.contains("box5-open")) {
            el.classList.remove("box5-open");
            el.classList.add("box5");
            document.getElementById("img_4").style.transform = "rotate(0deg)";
            box2.style.display = "none";
        }
        this.id_openbox5 = null;
        return;
    }

    this.show(id);

    el.classList.remove("box5");
    el.classList.add("box5-open");
    document.getElementById("img_4").style.transform = "rotate(180deg)";
    box2.style.display = "block";

    this.id_openbox5 = id;
};

this.box6click = function (id) {
    if (!document.getElementById(id)) {
        return;
    }
    var el = document.getElementById(id);
    var box2 = el.nextElementSibling;

    if (this.id_openbox6 === id) {
        if (el.classList.contains("box6-open")) {
            el.classList.remove("box6-open");
            el.classList.add("box6");
            document.getElementById("img_5").style.transform = "rotate(0deg)";
            box2.style.display = "none";
        }
        this.id_openbox6 = null;
        return;
    }

    this.show(id);

    el.classList.remove("box6");
    el.classList.add("box6-open");
    document.getElementById("img_5").style.transform = "rotate(180deg)";
    box2.style.display = "block";

    this.id_openbox6 = id;
};

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